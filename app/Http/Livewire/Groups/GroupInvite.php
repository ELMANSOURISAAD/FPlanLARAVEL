<?php

namespace App\Http\Livewire\Groups;

use App\Models\Group;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class GroupInvite extends Component
{


    use WithPagination;
    public Group $group;
    public string $user = '';
    protected $rules = [
        'user' => 'required|string|min:3',
    ];

    public function invite()
    {

        // check if already exists
        foreach ($this->group->users as $user) {
            if($this->user === $user->name)
            {
                $this->emit('GroupUpdated');
                return;
            }
        }
        $this->validate();
        $users = User::get();
        foreach ($users as  $user) {

           if($this->user === $user->name)
           {
                $this->group->users()->attach($user->id);
           }
        }
        $this->emit('GroupUpdated');

    }
    public function render()
    {
        return view('livewire.groups.group-invite');
    }
}
