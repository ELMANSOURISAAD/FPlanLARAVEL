<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Recette;
use Livewire\WithPagination;

class RecettesTable extends Component
{

    use WithPagination;

    public string $search = '';
    public string $orderField = 'name';
    public string $orderDirection = 'ASC';
    public array $selection = [];
    public string $name;

    public int $editId = 0;
    public int $editIngredientsId = 0;

    protected $listeners = [
        'RecetteUpdated' => 'OnRecetteUpdated',
        'RecetteAdded' => 'OnRecetteAdd',
        'RecetteIngredientsUpdated' => 'OnRecetteIngredientsUpdated',
    ];


    protected $rules = [
        'name' => 'required|string|min:6'
    ];

    public function add(){

        $this->validate();
        $recette = new Recette;
        $recette->name = $this->name;
        $recette->save();
        $this->emit('RecetteAdded');
    }


    public function deleteRecettes($ids)
    {
        Recette::destroy($ids);
        $this->selection = [];

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







    // Listening to events
    public function OnRecetteUpdated()
    {
       $this->reset('editId');
    }


    public function OnRecetteIngredientsUpdated()
    {
        $this->reset('editIngredientsId');
    }

    public function OnRecetteAdd()
    {
        $this->reset('editId');
    }

    public function EditThis(int $id)
    {
        $this->editId = $id;
    }

    public function editIngredientsId(int $id)
    {
        $this->editIngredientsId = $id;
    }

    // end

    public function render()
    {
        return view('livewire.recettes-table', [
            'recettes' => Recette::where('name','like', '%'.$this->search.'%')->orderBy($this->orderField, $this->orderDirection)->simplePaginate(5),
        ]);
    }

}
