<?php

namespace App\Http\Livewire\Groups\calendar;


use App\Models\Repas;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DataForDay extends Component
{


    public function render()
    {

        return view('livewire.groups.calendar.data-for-day',[
            'daterecu' => "",
            'stats' => "",
        ]);
    }
}
