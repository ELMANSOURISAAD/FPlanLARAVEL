<?php

namespace App\Http\Livewire\Template;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class Leftbar extends Component
{
    public int $count = 0;
    public $currentRouteName;

    protected $listeners = [
        'InventaireUpdated' => 'OnInventaireUpdated',
        'InventaireShared' => 'OnInventaireUpdated',
        'InventaireAdded' => 'OnInventaireUpdated',
        'InventaireDeleted' => 'OnInventaireUpdated',
        'RecetteDeleted' => 'OnInventaireUpdated',
        'RepasDeleted' => 'OnInventaireUpdated',

    ];
    public function OnInventaireUpdated()
    {
        $userId = Auth::id();
        $inventaires = User::find($userId)->inventaires()->has('courses')->get();
        $this->count = $inventaires->count();
    }
    public function mount()
    {
        $this->currentRouteName = Route::currentRouteName();
        $userId = Auth::id();
        $inventaires = User::find($userId)->inventaires()->has('courses')->get();
        $this->count = $inventaires->count();
    }
    public function render()
    {

        $userId = Auth::id();



        $user = User::find($userId);
        return view('livewire.template.leftbar', [
            'user' => $user,
            'route' => $this->currentRouteName,
            'count_courses' => $this->count
        ]);
    }
}
