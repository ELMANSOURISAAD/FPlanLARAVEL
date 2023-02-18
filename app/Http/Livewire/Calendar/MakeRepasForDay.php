<?php

namespace App\Http\Livewire\Calendar;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MakeRepasForDay extends Component
{
    public string $day = '0';


    public function render()
    {
        $userId = Auth::id();
        $recettes = User::find($userId)->recettes;
        return view('livewire.calendar.make-repas-for-day', [
            'recettes' => $recettes,
        ]);
    }
}
