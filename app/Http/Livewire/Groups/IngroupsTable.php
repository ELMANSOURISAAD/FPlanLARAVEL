<?php

namespace App\Http\Livewire\Groups;

use App\Models\GroupInventaire;
use App\Models\Group;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class IngroupsTable extends Component
{

    use WithPagination;
    public string $search = '';
    public string $orderField = 'name';
    public string $orderDirection = 'ASC';
    public int $inventaireShares = 0;
    public int $inventaireCalendar = 0;


    protected $listeners = ['refreshComponent' => '$refresh'];

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

    public function LeaveGroup($id)
    {

        $userId = Auth::id();



        foreach (Group::find($id)->inventaires as $inventaire) {
            if($inventaire->user_id === $userId)
            {
                Group::find($id)->inventaires()->detach($inventaire->id);
            }
        }

        // Quitter le groupe
        Group::find($id)->users()->detach(Auth::id());

        $this->emit('refreshComponent');
    }



    public function SeeInventaire($id)
    {
        $this->reset('inventaireShares','inventaireCalendar');
        $this->inventaireShares = $id;
    }


    public function SeeCalendar($id)
    {
        $this->reset('inventaireShares','inventaireCalendar');
        $this->inventaireCalendar = $id;
    }









    public function render()
    {
        $userId = Auth::id();



        $ibelongtogroups = (User::find($userId)->Ingroups()->where('name','like', '%'.$this->search.'%')
        ->orderBy($this->orderField, $this->orderDirection)->paginate(6));
    // test add user to group
        //dd($ibelongtogroups);

        return view('livewire.groups.ingroups-table', [
            'groups' => $ibelongtogroups,
        ]);
    }

}
