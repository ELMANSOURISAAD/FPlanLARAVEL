<?php

namespace App\Http\Livewire;

use App\Models\Element;
use Livewire\Component;

class ElementForm extends Component
{

    public Element $element;
    protected $rules = [
        'element.name' => 'required|string|min:3',
        'element.unit' => 'required|string|min:1'
    ];

    public function save(){
        $this->validate();
        $this->element->save();
        $this->emit('ElementUpdated');
    }
    public function render()
    {
        return view('livewire.element-form');
    }
}
