<?php

namespace App\Http\Livewire\Calendar;


use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class Calendartable extends Component
{
    public int  $buttonVisible ;

    public function showAddButtonForDay($dayint)
    {
        $this->buttonVisible = $dayint;
    }

    public function render()
    {
        //$days = ['lundi','mardi','mercredi','jeudi','vendredi','samedi','dimanche'];
        $date=Carbon::now()->locale('fr');
        $userId = Auth::id();
        $repas = User::find($userId)->repas;
        $inventaires = User::find($userId)->inventaires;
        return view('livewire.calendar.calendartable',[
            'repas' => $repas,
            'inventaires' => $inventaires,
            'carbonDate' => $date,


        ]);
    }
}
