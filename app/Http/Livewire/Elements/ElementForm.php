<?php

namespace App\Http\Livewire\Elements;

use App\Models\Element;
use Livewire\Component;

class ElementForm extends Component
{

    public Element $element;
    protected $rules = [
        'element.name' => 'required|string|min:3',
        'element.unit' => 'required|string|min:1',
        'element.price' => 'required|between:0,999'
    ];

    public function save(){
        $this->validate();
        $this->element->save();
        $this->emit('ElementUpdated');
    }
    public function render()
    {
        return view('livewire.elements.element-form');
    }
}
