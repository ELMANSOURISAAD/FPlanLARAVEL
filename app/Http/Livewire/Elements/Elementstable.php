<?php

namespace App\Http\Livewire\Elements;

use App\Models\Element;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
    public string $price;

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
        $element = new Element;
        $element->name = $this->name;
        $element->unit = $this->unit;
        $element->price = $this->price;
        $element->user_id = Auth::id();
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
        $userId = Auth::id();
        $elements = User::find($userId)->elements()
            ->where('name','like', '%'.$this->search.'%')
            ->orderBy($this->orderField, $this->orderDirection)
            ->simplePaginate(2);
        return view('livewire.elements.elementstable', [
            'elements' => $elements
        ]);
    }
}
