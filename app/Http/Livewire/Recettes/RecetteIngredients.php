<?php

namespace App\Http\Livewire\Recettes;

use App\Models\Element;
use App\Models\Recette;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RecetteIngredients extends Component
{

    public Recette $recette;
    public  $element_toadd = 0;
    public  $quantity_toadd = 0;
    public  $unitFront = "";


    protected $rules = [
        'recette.name' => 'required|string|min:6'
    ];

    protected $listeners = [
        'RecetteUpdated' => 'OnRecetteUpdated',
    ];

    public function save(){
        $this->validate();
        $this->recette->save();
        $this->emit('RecetteIngredientsUpdated');


    }

    public function DeleteIngredientFromRecette($id_element)
    {
        $this->recette->elements()->detach($id_element);
        $this->emit('refreshRecettes');
        session()->flash('ElementDeleted', 'Ingredient successfully deleted.');
    }
    public function updateFrontUnit(){
        $element = Element::find($this->element_toadd);

        $this->unitFront = $element->unit;
    }
    public function addIngredientToRecette()
    {

        // TO DO : Si l'element existe deja dans la recette,il faut mettre a jour la quantité.

        $this->validate();
        $this->recette->elements()->attach($this->element_toadd, ['quantity'=> $this->quantity_toadd ]);
        $this->emit('refreshRecettes');
        session()->flash('ElementDeleted', 'Ingredient successfully Added.');
        $this->reset('element_toadd','quantity_toadd');

    }
    public function render()
    {
        $userId = Auth::id();
        return view('livewire.recettes.recette-ingredients', [
            'elements' => User::find($userId)->elements()->get(),
        ]);
    }
}
