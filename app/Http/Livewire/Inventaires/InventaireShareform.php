<?php

namespace App\Http\Livewire\Inventaires;

use App\Models\Inventaire;
use App\Models\User;
use App\Models\Group;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class InventaireShareform extends Component
{

    public Inventaire $inventaire;
    public int $group;
    public int $pourcentage;
    protected $rules = [
        'pourcentage' => 'required|between:0,100',
    ];


    public function share(){
        $this->validate();

        ($this->inventaire->groups()->attach($this->group, ['pourcentage'=> $this->pourcentage ]));
        $this->emit('InventaireShared');
    }

    public function render()
    {
        $userId = Auth::id();
        $groups = User::find($userId)->ingroups;
        return view('livewire.inventaires.inventaire-shareform', [
            'groups' => $groups
        ]);
    }
}
