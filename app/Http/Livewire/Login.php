<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class Login extends Component
{

    public $form = [
        'email'=>'',
        'password'=>'',
    ] ;

    protected $rules = [
        'form.email' => 'required|email',
        'form.password' => 'required|string|min:6'
    ];



    public function submit(){

        $this->validate();
        if(Auth::attempt($this->form)){
        return redirect()->to('/Recettes');
        }

    }
    public function render()
    {
        return view('livewire.login');
    }
}
