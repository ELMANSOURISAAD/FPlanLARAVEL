<?php

namespace App\Http\Livewire\Groups;

use Livewire\Component;
use Livewire\WithPagination;

class Mygroups extends Component
{

    use WithPagination;
    public function render()
    {
        return view('livewire.groups.mygroups');
    }
}
