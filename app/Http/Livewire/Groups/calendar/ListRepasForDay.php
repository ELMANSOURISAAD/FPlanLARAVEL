<?php

namespace App\Http\Livewire\Groups\calendar;

use App\Models\Group;
use App\Models\Repas;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListRepasForDay extends Component
{
    public Carbon $day;
    public Group $group;
    public int $group_id;

    public function mount(){
        $this->group_id = $this->group->id;
    }

    public function getRepasForDay($adate)
    {
        $userId = Auth::id();
        $repas = User::find($userId)->repas()
        ->where([
            'date_repas' => $adate->toDateString(),
            'group_id' => $this->group_id
        ])
        ->get();
        return $repas;
    }

    public function DeleteRepasFromDay($id_repas)
    {
        $repas = Repas::find($id_repas);
        ($repas->courses()->delete());
        Repas::destroy($id_repas);
        $this->emit("RepasDeleted");
    }


    public function render()
    {

        return view('livewire.groups.calendar.list-repas-for-day',[
            'repas' => $this->getRepasForDay($this->day),
            'daterecu' => $this->day,
            'group' => $this->group,
        ]);
    }
}
