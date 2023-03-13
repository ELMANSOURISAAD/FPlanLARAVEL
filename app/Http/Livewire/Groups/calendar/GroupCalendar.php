<?php

namespace App\Http\Livewire\Groups\calendar;

use App\Models\Group;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class GroupCalendar extends Component
{
    public int  $buttonVisible = 0 ;


    public ?Carbon $day;
    public Group $group;
    protected $listeners = [
        'RepasAdded' => 'OnRepasAdded',
        'RepasDeleted' => '$refresh',
        'refreshComponent' => '$refresh',
        'CourseAdded' => '$refresh'
    ];




    public function showAddButtonForDay($dayint)
    {
        $this->buttonVisible = $dayint;
    }
    public function nextt($date)
    {

        $date = Carbon::parse($date);
        $this->day = $date->addDays(7)->locale('fr');
    }
    public function prevv($date)
    {
        $date = Carbon::parse($date);
        $this->day = $date->addDays(-7)->locale('fr');
    }

    public function OnRepasAdded()
    {
        $this->reset('buttonVisible');
    }





    public function render()
    {
        //$days = ['lundi','mardi','mercredi','jeudi','vendredi','samedi','dimanche'];

        $userId = Auth::id();



        $inventaires = User::find($userId)->inventaires;
        return view('livewire.groups.calendar.group-calendar',[

            'inventaires' => $inventaires,

        ]);

    }
}
