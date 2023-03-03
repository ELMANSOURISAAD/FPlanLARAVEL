<?php

namespace App\Http\Livewire\Groups;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Group;

class GroupsTable extends Component
{

    use WithPagination;
    public string $search = '';
    public string $orderField = 'name';
    public string $orderDirection = 'ASC';
    public array $selection = [];
    public string $name;

    public int $editId = 0;

    protected $rules = [
        'name' => 'required|string|min:3',
    ];

    protected $listeners = [
        'GroupUpdated' => 'OnGroupUpdated',
        'GroupAdded' => 'OnGroupAdd',
        'refreshGroups' => '$refresh'
    ];

    public function add( $checked)
    {


        $this->validate();
        $group = new Group;
        $group->name = $this->name;
        $group->user_id = Auth::id();
        $group->save();
        if(isset($checked['incluregroupe']))
        {
            $group->users()->attach(Auth::id());
        }

        $this->emit('GroupAdded');
    }


    public function deleteGroups($ids)
    {
        Group::destroy($ids);
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


    public function OnGroupUpdated()
    {
       $this->reset('editId');
    }


    public function OnGroupAdd()
    {

        $this->reset('editId');
    }



    public function render()
    {
        $userId = Auth::id();

        $mygroups = (User::find($userId)->groups()->simplePaginate(2));
        //dd($mygroups);
        // test add user to group

         //$agroup = Group::find(5);
         //$agroup->users()->attach(23);


        $ibelongtogroups = (User::find($userId)->Ingroups()->simplePaginate(2));
        //dd($ibelongtogroups);

        return view('livewire.groups.groups-table', [
            'groups' => $mygroups,
            'ingroups' => $ibelongtogroups,
        ]);
    }

}
