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
    public int $group_id;


    public function mount(){
        $this->group_id = $this->group->id;
    }



    public function render()
    {
        $disponibles = [];

        $groupInventory = ($this->group->inventaires);

        foreach ($groupInventory as $inventaire)
        {

            if (array_key_exists($inventaire->name, $disponibles))
            {

                $disponibles[$inventaire->name]['quantity'] += $inventaire->pivot->quantity;

            }
            else
            {
                $disponibles[$inventaire->name]['quantity'] = $inventaire->pivot->quantity;
                $disponibles[$inventaire->name]['unit'] = $inventaire->pivot->unit;
                $disponibles[$inventaire->name]['name'] = $inventaire->name;
            }

        }

        return view('livewire.groups.group-inventaire', [
            'groupInventory' => $disponibles,
        ]);
    }
}
