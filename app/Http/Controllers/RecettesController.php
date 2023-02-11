<?php

namespace App\Http\Controllers;
use App\Models\Recette;

class RecettesController extends Controller
{

    public function index(){

        // $recettes = Recette::all();
        $recettes = Recette::get(); // Just as valid, this means exactly the same
       // $names = [];
       // foreach ($recettes as $recette) {
        //    $names[] =  $recette->name;
        // }

        return view('Recettes/index')
            ->with('name', 'Admin')
            ->with('recettes', $recettes);
    }

}
