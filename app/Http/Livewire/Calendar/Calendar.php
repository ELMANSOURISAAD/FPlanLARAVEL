<?php

namespace App\Http\Livewire\Calendar;

use Livewire\Component;
use Carbon\Carbon;

class Calendar extends Component
{


    public function render()
    {
        $today = Carbon::today();
        return view('livewire.calendar.calendar',[
            'day' => $today,
        ]);
    }
}
