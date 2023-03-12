<?php

namespace App\Http\Livewire\Groups\calendar;


use App\Models\Repas;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListRepasForDay extends Component
{
    public Carbon $day;



    public function render()
    {

        return view('livewire.groups.calendar.list-repas-for-day',[
            'repas' => "",
            'daterecu' => "",
        ]);
    }
}
