<?php

namespace App\Http\Livewire\Calendar;

use App\Models\Element;
use App\Models\Recette;
use App\Models\Repas;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MakeRepasForDay extends Component
{
    public string $day = '0';
    public int $recette_id = 0;

    protected $rules = [
        'recette_id' => 'required|int|min:1',
    ];
    public function AjouterRepasDay($adate)
    {
        $this->validate();
        $date = Carbon::parse($adate);
        $repas = new Repas;
        $repas->date_repas = $date->toDateString();
        $repas->recette_id = $this->recette_id;
        $repas->user_id = Auth::id();
        $repas->save();
        $this->emit('RepasAdded');
        $this->reset("day");
    }

    public function render()
    {
        $userId = Auth::id();
        $recettes = User::find($userId)->recettes;
        return view('livewire.calendar.make-repas-for-day', [
            'recettes' => $recettes,
        ]);
    }
}
