<?php

namespace App\Http\Livewire\Groups\calendar;



use App\Models\User;
use App\Models\Group;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DataForDay extends Component
{

    public Carbon $day;
    public Group $group;
    public int $group_id;


    public function mount(){
        $this->group_id = $this->group->id;
    }

    public function getRepasStatsForDay($adate)
    {

        $stats = array(
            "Coût" => array(
                "unit" => 'euro',
                "value" => 0,
            ),
            "Calories" => array(
                "unit" => 'Kilojoules',
                "value" => 0,
            ),

        );


        $userId = Auth::id();
        $repas = User::find($userId)->repas()
        ->where([
            'date_repas' => $adate->toDateString(),
            'group_id' => $this->group_id
        ])
        ->get();

        if(!$repas->IsEmpty()){
        foreach ($repas as $bruh)
        {
            if($bruh->recette){
            $stats['Coût']['value'] += ($bruh->recette->price);
            $stats['Calories']['value'] += ($bruh->recette->calories);
        }
        }
        }

        return $stats;
    }
    public function render()
    {

        return view('livewire.groups.calendar.data-for-day',[
            'daterecu' => $this->day,
            'stats' => $this->getRepasStatsForDay($this->day),
        ]);
    }
}
