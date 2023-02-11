<?php

namespace App\Http\Controllers;

use App\Models\Element;

class IngredientsController extends Controller
{

    public function index(){

       $elements =  Element::get();

        return view('Ingredients/index')
            ->with('name', 'Admin')
            ->with('elements', $elements);
    }

}
