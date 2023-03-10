<?php

namespace App\Http\Livewire\Template;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class Leftbar extends Component
{




    public function render()
    {

        $userId = Auth::id();
        $inventaires = User::find($userId)->inventaires()->has('courses')->get();


        $user = User::find($userId);
        return view('livewire.template.leftbar', [
            'user' => $user,
            'count_courses' => $inventaires->count()
        ]);
    }
}
