<?php

namespace App\Http\Livewire\Groups;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class GroupsTable extends Component
{

    use WithPagination;
    public string $search = '';
    public string $orderField = 'name';
    public string $orderDirection = 'ASC';

    public function render()
    {
        $userId = Auth::id();
        $mygroups = (User::find($userId)->groups()->get());
        // test add user to group

        // $agroup = Group::find(2);
        // $agroup->users()->attach(10);

        $ibelongtogroups = (User::find($userId)->groups()->get());


        return view('livewire.groups.groups-table', [
            'groups' => $mygroups,
            'ingroups' => $ibelongtogroups,
        ]);
    }

}
