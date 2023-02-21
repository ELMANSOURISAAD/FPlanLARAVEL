<?php

namespace App\Http\Livewire\Recettes;


use LivewireUI\Modal\ModalComponent;

class suggestions extends ModalComponent
{
    public function render()
    {
        return view('livewire.recettes.suggestions');
    }
}
