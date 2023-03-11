<?php

namespace App\Http\Livewire\Calendar;

use App\Models\Course;
use App\Models\Inventaire;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class Calendartable extends Component
{
    public int  $buttonVisible = 0 ;

    public ?Carbon $day;
    protected $listeners = [
        'RepasAdded' => '$refresh',
        'RepasDeleted' => '$refresh',
        'refreshComponent' => '$refresh',
        'CourseAdded' => '$refresh'
    ];







public function GenerateCourses()
{

}




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
        $repas = User::find($userId)->repas;
        $courses = User::find($userId)->courses;

        $inventaires = User::find($userId)->inventaires;
        return view('livewire.calendar.calendartable',[
            'repas' => $repas,
            'inventaires' => $inventaires,

        ]);

    }
}
