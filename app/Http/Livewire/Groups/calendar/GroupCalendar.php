<?php

namespace App\Http\Livewire\Groups\calendar;

use App\Models\Group;
use Livewire\Component;
use Livewire\WithPagination;

use Carbon\Carbon;

class GroupCalendar extends Component
{

    use WithPagination;
    public Group $group;
    public ?Carbon $day;

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
    public function render()
    {
        return view('livewire.groups.calendar.group-calendar');
    }
}
