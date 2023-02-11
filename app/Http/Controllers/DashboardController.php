<?php

namespace App\Http\Controllers;
use App\Models\Recette;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(){

        // Load




        $recettes = Recette::get(); // Just as valid, this means exactly the same
        // $names = [];
        // foreach ($recettes as $recette) {
        //    $names[] =  $recette->name;
        // }

        return view('Dashboard/index')
            ->with('name', 'Admin')
            ->with('recettes', $recettes);
    }

}
