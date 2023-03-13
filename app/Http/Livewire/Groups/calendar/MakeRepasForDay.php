<?php

namespace App\Http\Livewire\Groups\calendar;

use App\Models\Group;
use App\Models\Repas;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MakeRepasForDay extends Component
{
    public ?Carbon $day;
    public int $recette_id = 0;
    public Group $group;
    public int $group_id;

    public function mount(){

        $this->group_id = $this->group->id;

    }


    protected $listeners = ['RepasAdded' => '$refresh'];

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
        $repas->group_id = $this->group_id;
        $repas->user_id = Auth::id();

        $repas->save();

        $this->emit('RepasAdded');

    }

    public function render()
    {
        $userId = Auth::id();
        $recettes = User::find($userId)->recettes;
        return view('livewire.groups.calendar.make-repas-for-day', [
            'recettes' => $recettes,
        ]);
    }
}
