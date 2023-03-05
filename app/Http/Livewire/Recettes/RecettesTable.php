<?php

namespace App\Http\Livewire\Recettes;

use App\Models\ElementRecette;
use App\Models\Recette;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
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
        'refreshRecettes' => '$refresh'
    ];


    protected $rules = [
        'name' => 'required|string|min:6'
    ];

    public function add()
    {
        $this->validate();
        $recette = new Recette;
        $recette->name = $this->name;
        $recette->user_id = Auth::id();
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
        $this->name = '';
        $this->reset('editId');
    }

    public function EditThis(int $id)
    {
        $this->reset('editIngredientsId');
        $this->editId = $id;
    }

    public function editIngredientsId(int $id)
    {
        $this->reset('editId');
        $this->editIngredientsId = $id;
    }

    // end

    public function render()
    {
        $userId = Auth::id();
        $element_recette = Recette::has('elements')->get();
        $recettes = User::find($userId)->recettes()
            ->where('name','like', '%'.$this->search.'%')
            ->orderBy($this->orderField, $this->orderDirection)
            ->Paginate(6);

        return view('livewire.recettes.recettes-table', [
            'recettes' => $recettes,
            'recettes_withelements' => $element_recette,
        ]);
    }

}
