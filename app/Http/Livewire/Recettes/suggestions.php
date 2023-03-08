<?php

namespace App\Http\Livewire\Recettes;

use App\Http\Livewire\Inventaires\Inventaires;
use App\Models\Course;
use App\Models\Element;
use App\Models\ElementRecette;
use App\Models\Group;
use App\Models\GroupInventaire;
use App\Models\GroupUser;
use App\Models\Inventaire;
use App\Models\Recette;
use App\Models\Repas;
use Illuminate\Support\Facades\Auth;
use LivewireUI\Modal\ModalComponent;

class suggestions extends ModalComponent
{


    public function Go()
    {
        $id = Auth::id();
        Repas::where('user_id','=',$id)->delete();
        Recette::where('user_id','=',$id)->delete();
        Element::where('user_id','=',$id)->delete();

        // GROUPS
        Group::where('user_id','=',$id)->delete();
        GroupUser::where('user_id','=',$id)->delete();

        // INVENTAIRE
        Inventaire::where('user_id','=',$id)->delete();

        // COURSES
        Course::where('user_id','=',$id)->delete();


        $ingredients = array(
        "Beurre" => array("unit" => "grammes", "price" => 2.5, "calories" => 7),
        "Carottes" => array("unit" => "grammes", "price" => 0.0012, "calories" => 0.41),
        "Farine" => array("unit" => "grammes", "price" => 0.75, "calories" => 3.8),
        "Huile d'olive" => array("unit" => "cuillères à soupe", "price" => 0.15, "calories" => 120),
        "Oeufs" => array("unit" => "pieces", "price" => 0.25, "calories" => 155),
        "Poivre" => array("unit" => "grammes", "price" => 0.05, "calories" => 3.2),
        "Pommes de terre" => array("unit" => "grammes", "price" => 0.001, "calories" => 0.77),
        "Sel" => array("unit" => "grammes", "price" => 0.02, "calories" => 0),
        "Sucre" => array("unit" => "grammes", "price" => 0.8, "calories" => 3.87),
        "Tomates" => array("unit" => "grammes", "price" => 2.5, "calories" => 0.18),
        );
        foreach ($ingredients as $ingredient=>$data) {
            $element = new Element;
            $element->name = $ingredient;
            $element->price = $data['price'];
            $element->unit = $data['unit'];
            $element->calories = $data['calories'];
            $element->user_id = Auth::id();
            $element->save();
        }





        $recipes = array(
            "Omelette" => array(
                "Oeufs" => array("quantity" => 1, "unit" => "pieces"),
                "Sel" => array("quantity" => 1, "unit" => "grammes"),
                "Huile d'olive" => array("quantity" => 1, "unit" => "cuillères à soupe")
            ),
            "Soupe de carottes" => array(
                "Carottes" => array("quantity" => 1000, "unit" => "grammes"),
                "Beurre" => array("quantity" => 50, "unit" => "grammes"),
                "Huile d'olive" => array("quantity" => 2, "unit" => "cuillères à soupe"),
                "Sel" => array("quantity" => 10, "unit" => "grammes"),
                "Poivre" => array("quantity" => 5, "unit" => "grammes")
            ),
            "Gratin de pomme de terre" => array(
                "Pommes de terre" => array("quantity" => 1000, "unit" => "grammes"),
                "Beurre" => array("quantity" => 50, "unit" => "grammes"),
                "Farine" => array("quantity" => 50, "unit" => "grammes"),
                "Sel" => array("quantity" => 10, "unit" => "grammes"),
                "Poivre" => array("quantity" => 5, "unit" => "grammes"),
                "Lait" => array("quantity" => 500, "unit" => "millilitres")
            ),
            "Omelette tomate" => array(
                "Oeufs" => array("quantity" => 2, "unit" => "pieces"),
                "Tomates" => array("quantity" => 500, "unit" => "grammes"),
                "Beurre" => array("quantity" => 10, "unit" => "grammes"),
                "Sel" => array("quantity" => 2, "unit" => "grammes"),
                "Poivre" => array("quantity" => 2, "unit" => "grammes")
            ),
        );

        foreach ($recipes as $recette => $ingredients) {

            $t = new Recette;
            $t->name = $recette;
            $t->user_id = Auth::id();
            $t->save();

            $temp_r = Recette::where([
                ['name', '=', $recette],
                ['user_id', '=', Auth::id()]])->first();
            foreach ($ingredients as $name => $data) {

                $element = Element::where([
                    ['name', '=', $name],
                    ['user_id', '=', Auth::id()]])->first();
               // dd($element);
                    $temp_r->elements()->attach($element,['quantity'=> $data['quantity']]);
                    $temp_r->save();
            }

        }
        return redirect('/Ingredients');


    }

    public function render()
    {
        return view('livewire.recettes.suggestions');
    }
}
