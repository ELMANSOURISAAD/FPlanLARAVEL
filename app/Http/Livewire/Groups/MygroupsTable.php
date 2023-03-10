<?php

namespace App\Http\Livewire\Groups;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Group;

class MygroupsTable extends Component
{

    use WithPagination;
    public string $search = '';
    public string $orderField = 'name';
    public string $orderDirection = 'ASC';
    public array $selection = [];
    public string $name = '';

    public int $editId = 0;
    public int $inviteId = 0;
    public int $inventaireShares = 0;

    protected $rules = [
        'name' => 'required|string|min:3',
    ];

    protected $listeners = [
        'GroupUpdated' => 'OnGroupUpdated',
        'GroupAdded' => 'OnGroupAdded',
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


    public function EditThis(int $id)
    {
        $this->reset('inviteId','name');
        $this->editId = $id;

    }

    public function InviteSomeone(int $id)
    {
        $this->reset('editId');
        $this->inviteId = $id;

    }

    public function deleteGroups($ids)
    {
        // Supprimer les inventaires partagés
        foreach ($ids as $id) {
           // $parent = Group::find($id);
           // foreach ($parent->inventaires as $child){
            //    $child->delete();
           // }

          // supprimer le groupe


        }

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


    public function OnGroupAdded()
    {

        $this->reset('editId','name');
    }



    public function SeeInventaire($id)
    {
        $this->inventaireShares = $id;
    }









    public function render()
    {
        $userId = Auth::id();

        $mygroups = (User::find($userId)->groups()->where('name','like', '%'.$this->search.'%')
            ->orderBy($this->orderField, $this->orderDirection)->paginate(2));

        return view('livewire.groups.mygroups-table', [
            'groups' => $mygroups,
        ]);
    }

}
