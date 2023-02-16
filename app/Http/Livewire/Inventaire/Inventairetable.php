<?php

namespace App\Http\Livewire\Inventaire;


use App\Models\Element;
use Livewire\Component;
use Livewire\WithPagination;

class inventairetable extends Component
{
    use WithPagination;

    public string $search = '';
    public string $orderField = 'name';
    public string $orderDirection = 'ASC';
    public array $selection = [];

    public string $name;
    public string $unit;
    public string $price;
    public string $stock;
    public int $editId = 0;

    protected $listeners = [
        'ElementUpdated' => 'OnElementUpdated',
        'ElementAdded' => 'OnElementAdd'
    ];


    protected $rules = [
        'name' => 'required|string|min:3',
        'unit' => 'required|string|min:1',
        'price' => 'required|between:0,999',
    ];

    public function add(){
        $this->validate();
        //$element = new Element;
        // $element->name = $this->name;
        // $element->unit = $this->unit;
        // $element->price = $this->price;
        // $element->save();
        // $this->emit('ElementAdded');

    }


    public function deleteElements($ids)
    {
        // Element::destroy($ids);
        //  $this->selection = [];

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
        return view('livewire.inventaire.inventairetable', [
             'elements' => Element::where('name','like', '%'.$this->search.'%')->orderBy($this->orderField, $this->orderDirection)->simplePaginate(2),
        ]);
    }
}
