<?php

namespace App\Http\Controllers;
use App\Models\Recette;
use App\Models\Element;

class RecettesController extends Controller
{

    public function index(){



        // $recettes = Recette::all();
        $recettes = Recette::get(); // Just as valid, this means exactly the same
       // $names = [];
       // foreach ($recettes as $recette) {
        //     $names[] =  $recette->name;
        // }
      //  $element1 = new Element(['name' => 'Fajitas']);
       // $element2 = new Element(['name' => 'WRAP']);

        //$recette = Recette::find(1);
        //$element1 = new Element([
      //      'name' => 'EAU',
        //    'unit' => 'L'
//
        // ]);
       //  $element2 = new Element(['name' => 'Chekc']);
       //  $recette->elements()->save($element1);
       // $recette->elements()->save($element2);


        //  $recette->elements()->save($element1);
        //  $recette->elements()->save($element2);
        //  $ingredients =  $recette->elements()->get();
        //  dump($ingredients);

      //  foreach ($ingredients as $ingredient){
        //    echo ($ingredient->name);
     //   }



        return view('Recettes/index')
           ->with('name', 'Admin')
           ->with('recettes', $recettes);
    }

}
