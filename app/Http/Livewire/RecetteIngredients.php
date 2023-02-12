<?php

namespace App\Http\Livewire;

use App\Models\Recette;
use Livewire\Component;

class RecetteIngredients extends Component
{

    public Recette $recette;
    protected $rules = [
        'recette.name' => 'required|string|min:6'
    ];

    public function save(){
        $this->validate();
        $this->recette->save();
        $this->emit('RecetteIngredientsUpdated');
    }
    public function render()
    {
        return view('livewire.recette-ingredients');
    }
}
