<?php

namespace App\Http\Livewire\Groups;

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











    public function render()
    {
        $userId = Auth::id();



        $ibelongtogroups = (User::find($userId)->Ingroups()->where('name','like', '%'.$this->search.'%')
        ->orderBy($this->orderField, $this->orderDirection)->paginate(2));
    // test add user to group
        //dd($ibelongtogroups);

        return view('livewire.groups.ingroups-table', [
            'groups' => $ibelongtogroups,
        ]);
    }

}
