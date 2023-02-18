<?php

namespace App\Http\Livewire\Calendar;


use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListRepasForDay extends Component
{


    public Carbon $day;
    public function getRepasForDay($adate)
    {
        $userId = Auth::id();
        $repas = User::find($userId)->repas()
        ->where('date_repas', $adate->toDateString())
        ->get();
        return $repas;
    }
    public function render()
    {
        return view('livewire.calendar.list-repas-for-day',[
            'repas' => $this->getRepasForDay($this->day),
            'daterecu' => $this->day,
        ]);
    }
}
