<?php

namespace App\Http\Livewire\Inventaires;


use App\Models\Inventaire;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Inventairestable extends Component
{
    use WithPagination;

    public string $search = '';
    public string $orderField = 'name';
    public string $orderDirection = 'ASC';
    public array $selection = [];

    public string $name;
    public string $unit;
    public string $stock;

    public int $editId = 0;

    protected $listeners = [
        'InventaireUpdated' => 'OnInventaireUpdated',
        'InventaireAdded' => 'OnInventaireAdd'
    ];


    protected $rules = [
        'name' => 'required|string|min:3',
        'unit' => 'required|string|min:1',
        'stock' => 'required|between:0,999',
    ];

    public function add(){

        $this->validate();
        $inventaire = new Inventaire();
        $inventaire->name = $this->name;
        $inventaire->unit = $this->unit;
        $inventaire->stock = $this->stock;
        $inventaire->user_id = Auth::id();
        $inventaire->save();
        $this->emit('InventairetAdded');

    }


    public function deleteInventaires($ids)
    {
         Inventaire::destroy($ids);
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
    public function OnInventaireUpdated()
    {
        $this->reset('editId');
    }

    public function OnInventaireAdd()
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

        $elements = User::find($userId)->elements;
        $inventaires = User::find($userId)->inventaires()
            ->where('name','like', '%'.$this->search.'%')
            ->orderBy($this->orderField, $this->orderDirection)
            ->simplePaginate(2);

        return view('livewire.inventaires.inventairestable', [
            'inventaires' => $inventaires,
            'elements' => $elements,
        ]);
    }
}
