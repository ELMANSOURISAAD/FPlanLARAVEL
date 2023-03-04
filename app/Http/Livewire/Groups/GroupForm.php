<?php

namespace App\Http\Livewire\Groups;

use App\Models\Group;
use Livewire\Component;
use Livewire\WithPagination;

class GroupForm extends Component
{

    use WithPagination;
    public Group $group;
    protected $rules = [
        'group.name' => 'required|string|min:3',

    ];

    public function save(){
        $this->validate();
        $this->group->save();
        $this->emit('GroupUpdated');
    }
    public function render()
    {
        return view('livewire.groups.group-form');
    }
}
