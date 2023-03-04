<?php

namespace App\Http\Livewire\Groups;

use App\Models\Group;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class GroupInventaire extends Component
{


    use WithPagination;
    public Group $group;



    public function render()
    {


        $groupInventory = ($this->group->inventaires);

        return view('livewire.groups.group-inventaire', [
            'groupInventory' => $groupInventory,
        ]);
    }
}
