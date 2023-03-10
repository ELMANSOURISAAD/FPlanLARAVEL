<?php

namespace App\Http\Livewire\Calendar;


use App\Models\Repas;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DataForDay extends Component
{
    public Carbon $day;

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
            ->where('date_repas', $adate->toDateString())->get();

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

        return view('livewire.calendar.data-for-day',[
            'daterecu' => $this->day,
            'stats' => $this->getRepasStatsForDay($this->day),
        ]);
    }
}
