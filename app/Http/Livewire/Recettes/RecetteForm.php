<?php

namespace App\Http\Livewire\Recettes;

use App\Models\Recette;
use Livewire\Component;

class RecetteForm extends Component
{

    public Recette $recette;
    protected $rules = [
        'recette.name' => 'required|string|min:6'
    ];

    public function save(){
        $this->validate();
        $this->recette->save();
        $this->emit('RecetteUpdated');
        $this->recette->getPriceAttribute();
    }
    public function render()
    {
        return view('livewire.recettes.recette-form');
    }
}
