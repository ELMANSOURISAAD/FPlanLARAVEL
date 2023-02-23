<?php

namespace App\Http\Livewire\Calendar;


use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class Calendartable extends Component
{
    public int  $buttonVisible = 0 ;

    public string $carbonDate = '';
    protected $listeners = [
        'RepasAdded' => 'OnRepasAdded'
    ];

    public array $currentselection = [];


    public function addselection($date)
    {
        $this->currentselection[] = $date;
    }

    public function showAddButtonForDay($dayint)
    {
        $this->buttonVisible = $dayint;
    }
    public function nextt($date)
    {
        $date = Carbon::parse($date);
        $this->carbonDate = $date->addDays(7)->locale('fr');
    }
    public function prevv($date)
    {
        $date = Carbon::parse($date);
        $this->carbonDate = $date->addDays(-7)->locale('fr');
    }

    public function OnRepasAdded()
    {

        $this->reset('buttonVisible');
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
            'carbonDate' => $this->carbonDate,
        ]);

    }
}
