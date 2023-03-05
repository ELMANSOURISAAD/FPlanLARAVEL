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
        $name = User::find($userId)->name;
        return view('livewire.template.leftbar', [
            'name' => $name,
        ]);
    }
}
