<?php

namespace App\Http\Livewire\Inventaires;

use App\Models\Element;
use App\Models\Group;
use App\Models\Inventaire;
use App\Models\Recette;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Inventairestable extends Component
{
    use WithPagination;

    public string $search = '';
    public string $orderField = 'name';
    public string $orderDirection = 'ASC';
    public array $selection = [];

    public string $name = '';
    public string $unit = '';
    public int $stock = 0;

    public int $editId = 0;
    public int $shareId = 0;

    protected $listeners = [
        'InventaireUpdated' => 'OnInventaireUpdated',
        'InventaireShared' => 'OnInventaireShared',
        'InventaireAdded' => 'OnInventaireAdded',
        'InventaireDeleted' => 'OnInventaireDeleted'
    ];


    protected $rules = [
        'name' => 'required|string|min:3',
        'unit' => 'required|string|min:1',
        'stock' => 'required|between:0,999',
    ];

    public function add(){

        $this->validate();
        $inventaire = new Inventaire();
        $inventaire->name = $this->name;
        $inventaire->unit = $this->unit;
        $inventaire->stock = $this->stock;
        $inventaire->user_id = Auth::id();
        $inventaire->save();
        $this->emit('InventaireAdded');

    }


    public function deleteInventaires($ids)
    {
         Inventaire::destroy($ids);
         $this->selection = [];
         $this->emit('InventaireDeleted');

    }
    public function setOrderField(string $name)
    {
        if($this->orderField === $name)
        {
            $this->orderDirection = $this->orderDirection === 'ASC' ? 'DESC' : 'ASC';

        }
        else{
            $this->orderDirection='ASC';
        }
        $this->orderField = $name ;

    }

    public function DeleteInventaireFromGroupe($id_inventaire,$id_groupe)
    {
        Group::find($id_groupe)->inventaires()->detach($id_inventaire);
        session()->flash('testflash', 'Crevard detected');
    }

    public function ListeDeCourse()
    {
        $fileName = 'courses.csv';
        $headers = array(
            "Content-Encoding: UTF-8",
            "Content-type"        => "text/csv; charset=UTF-8",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );
        $columns = array('Produit', 'Unité', 'Quantité');



        $inventaires = User::find(Auth::id())->inventaires;



        $callback = function() use($inventaires, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns,";");

            foreach ($inventaires as $inventaire) {
                foreach ($inventaire->courses as $course) {

                    $row['Produit']  = $inventaire->name;
                    $row['Unité']    = $course->pivot->unit;
                    $row['Quantité']    = $course->pivot->quantity;

                    fputcsv($file, array($row['Produit'], $row['Unité'], $row['Quantité']),";");
                }

            }

            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }



    public function ProposerRecettes()
    {
        

        $available_inventaire = [];
        $inventaires = User::find(Auth::id())->inventaires;
       
        foreach ($inventaires as $inventaire) {

            $name = ($inventaire['name']);
            
            $found_element = Element::where('name','=',$name)->get();
            if(!$found_element->IsEmpty())
            {
                $element = ($found_element->first);
                $inventaire->element_id = $element->id->id;
            }
            
            $available_inventaire[$name] = $inventaire;
        }
        
    /*     "id" => 42
        "name" => "Pommes de terre"
        "unit" => "grammes"
        "stock" => 0.0
        "created_at" => "2023-03-10 17:46:36"
        "updated_at" => "2023-03-10 17:46:36"
        "user_id" => 25
        "element_id" => "Pommes de terre" */
        
        $names = [];
        
        $recettes = Recette::with('elements')->where("user_id","<>",Auth::id())->get();
       
        foreach ($recettes as $recette_data) {
                $recette_data->possible = true;
                $name = $recette_data->name;
                
                foreach ($recette_data->elements as $element) {
                    $names[] = array('id'=>$element->id, 'name'=> $element->name,'quantity'=> $element->pivot->quantity);
                    if(!array_key_exists($element->name,$available_inventaire))
                    {
           
                        $recette_data->possible = false;
                    
                    }

                    if(array_key_exists($element->name,$available_inventaire))
                    {
           
                        if($available_inventaire[$element->name])
                        {
                            if($element->pivot->quantity > $available_inventaire[$element->name]['stock'])
                            {
                                $recette_data->possible = false;
                            }
                        }
                    
                    }
                    
                }
                
            
        }
      


        $possible = [];
        foreach ($recettes as $recette) {
            if($recette->possible === true)
            {
                $possible[] = $recette;
            }
        }


        foreach ($possible as $recette) {
            $toadd = new Recette;
            $toadd->name = $recette->name;
            $exist = Recette::where([
                ['name', '=', $toadd->name],
                ['user_id', '=', Auth::id()],
            ])->get();
            
            if($exist->IsEmpty())
            {
            $toadd->user_id = Auth::id();
            $toadd->save();
            foreach ($recette->elements as $ingredient) {
                $ihaveit = Element::where([
                    ['name', '=', $ingredient->name],
                    ['user_id', '=', Auth::id()],
                ])->get();

               if($ihaveit->IsEmpty())
               {
                $create = New Element;
                $create->user_id = Auth::id();
                $create->name = $ingredient->name;
                $create->unit = $ingredient->unit;
                $create->price = $ingredient->price;
                $create->calories = $ingredient->calories;
                $create->save();
                $id = $create->id;
               }
               else
               {

                $id = $ihaveit->first()->id;
                

               }
               $toadd->elements()->attach($id,['quantity'=> $ingredient->pivot->quantity ]);

                
            }
        }
            

        }

        $this->redirect('/Recettes');
       

       

    }



    // Listening to events
    public function OnInventaireUpdated()
    {
        $this->reset('editId','shareId');
    }

    public function OnInventaireAdded()
    {
        $this->reset('editId','shareId');
    }
    public function OnInventaireDeleted()
    {
        $this->reset('editId','shareId');
    }

    public function OnInventaireShared()
    {
        $this->reset('editId','shareId');
    }

    public function EditThis(int $id)
    {
        $this->reset('editId','shareId');
        $this->editId = $id;

    }

    public function ShareThis(int $id)
    {

        $this->reset('editId','shareId');

        $this->shareId = $id;

    }

    // end

    public function render()
    {
        $userId = Auth::id();

        $elements = User::find($userId)->elements;
        $inventaires = User::find($userId)->inventaires()->with('groups','courses')
            ->where('name','like', '%'.$this->search.'%')
            ->orderBy($this->orderField, $this->orderDirection)
            ->Paginate(6);







        return view('livewire.inventaires.inventairestable', [
            'inventaires' => $inventaires,
            'elements' => $elements,
        ]);
    }
}
