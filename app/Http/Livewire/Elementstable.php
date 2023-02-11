<?php

namespace App\Http\Livewire;

use App\Models\Element;

use Livewire\Component;
use Livewire\WithPagination;

class Elementstable extends Component
{
    use WithPagination;

    public string $search = '';
    public string $orderField = 'name';
    public string $orderDirection = 'ASC';
    public array $selection = [];

    public string $name;
    public string $unit;

    public int $editId = 0;

    protected $listeners = [
        'ElementUpdated' => 'OnElementUpdated',
        'ElementAdded' => 'OnElementAdd'
    ];


    protected $rules = [
        'name' => 'required|string|min:3',
        'unit' => 'required|string|min:1',
    ];

    public function add(){
        $this->validate();
        $element = new Element;
        $element->name = $this->name;
        $element->unit = $this->unit;
        $element->save();
        $this->emit('ElementAdded');

    }


    public function deleteElements($ids)
    {
        Element::destroy($ids);
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
    public function OnElementUpdated()
    {
        $this->reset('editId');
    }

    public function OnElementAdd()
    {
        $this->reset('editId');
    }

    public function EditThis(int $id)
    {
        $this->editId = $id;

    }

    // end

    public function render()
    {
        return view('livewire.elementstable', [
            'elements' => Element::where('name','like', '%'.$this->search.'%')->orderBy($this->orderField, $this->orderDirection)->simplePaginate(5),
        ]);
    }
}
