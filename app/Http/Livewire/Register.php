<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Register extends Component
{

    public $form = [
        'name'=>'',
        'email'=>'',
        'password'=>'',
    ] ;
    protected $rules = [
        'form.name' => 'required',
        'form.email' => 'required|email',
        'form.password' => 'required|string|min:6'
    ];



    public function submit(){
    $this->validate();
    User::create($this->form);
    return redirect()->to('/login');


    }
    public function render()
    {
        return view('livewire.register');
    }
}
