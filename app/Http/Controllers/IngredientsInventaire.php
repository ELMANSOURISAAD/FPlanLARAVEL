<?php

namespace App\Http\Controllers;

class IngredientsInventaire extends Controller
{

    public function index(){


        return view('template')
            ->with('name', 'Admin')
            ->with('occupation', 'Astronaut');
    }

}
