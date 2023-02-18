<?php

namespace App\Http\Livewire\Calendar;


use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class Calendartable extends Component
{
    public $buttonVisible = 0;

    public function showAddButtonForDay($day)
    {

        $this->buttonVisible = $day;
    }

    public function render()
    {
        $days = ['lundi','mardi','mercredi','jeudi','vendredi','samedi','dimanche'];
        $date=Carbon::now();
        $jour = $date->locale('fr')->dayName;

        $userId = Auth::id();
        $repas = User::find($userId)->repas;
        $inventaires = User::find($userId)->inventaires;
        return view('livewire.calendar.calendartable',[
            'repas' => $repas,
            'inventaires' => $inventaires,
            'days' => $days,
            'carbonDate' => $date,

        ]);
    }
}
