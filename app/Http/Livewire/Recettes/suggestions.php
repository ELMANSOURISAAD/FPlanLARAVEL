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
        "Carottes" => array("unit" => "kilogrammes", "price" => 1.2, "calories" => 0.41),
        "Farine" => array("unit" => "grammes", "price" => 0.75, "calories" => 3.8),
        "Huile d'olive" => array("unit" => "cuillères à soupe", "price" => 0.15, "calories" => 120),
        "Oeufs" => array("unit" => "unités", "price" => 0.25, "calories" => 155),
        "Poivre" => array("unit" => "grammes", "price" => 0.05, "calories" => 3.2),
        "Pommes de terre" => array("unit" => "kilogrammes", "price" => 1.1, "calories" => 0.77),
        "Sel" => array("unit" => "grammes", "price" => 0.02, "calories" => 0),
        "Sucre" => array("unit" => "grammes", "price" => 0.8, "calories" => 3.87),
        "Tomates" => array("unit" => "kilogrammes", "price" => 2.5, "calories" => 0.18),

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


        $recettes = array(
            "Omelette",
            "Salade niçoise",
            "Poulet rôti",
            "Quiche lorraine",
            "Tarte aux pommes",
        );
        foreach ($recettes as $recette) {
            $t = new Recette;
            $t->name = $recette;
            $t->user_id = Auth::id();
            $t->save();
        }



        $recipes = array(
            "Omelette" => array(
                "Oeuf" => array("quantity" => 1, "unit" => "piece"),
                "Sel" => array("quantity" => 1, "unit" => "pincée"),
                "Huile" => array("quantity" => 1, "unit" => "cuillère à soupe")
            ),
            "Salade niçoise" => array(
                "Thon" => array("quantity" => 200, "unit" => "grammes"),
                "Salade verte" => array("quantity" => 1, "unit" => "piece"),
                "Tomate" => array("quantity" => 2, "unit" => "piece"),
                "Oignon rouge" => array("quantity" => 1, "unit" => "piece"),
                "Concombre" => array("quantity" => 1, "unit" => "piece"),
                "Olives noires" => array("quantity" => 50, "unit" => "grammes"),
                "Anchois" => array("quantity" => 4, "unit" => "piece"),
                "Vinaigre balsamique" => array("quantity" => 1, "unit" => "cuillère à soupe"),
                "Huile d'olive" => array("quantity" => 3, "unit" => "cuillères à soupe")
            ),
            "Poulet rôti" => array(
                "Poulet" => array("quantity" => 1, "unit" => "piece"),
                "Sel" => array("quantity" => 2, "unit" => "pincées"),
                "Poivre" => array("quantity" => 1, "unit" => "pincée"),
                "Ail" => array("quantity" => 2, "unit" => "gousses"),
                "Thym" => array("quantity" => 1, "unit" => "brin"),
                "Huile d'olive" => array("quantity" => 2, "unit" => "cuillères à soupe")
            ),
            "Quiche lorraine" => array(
                "Pâte brisée" => array("quantity" => 1, "unit" => "piece"),
                "Lardons fumés" => array("quantity" => 200, "unit" => "grammes"),
                "Oeufs" => array("quantity" => 3, "unit" => "piece"),
                "Crème fraîche" => array("quantity" => 0.02, "unit" => "cl"),
                "Lait" => array("quantity" => 0.2, "unit" => "l"),
                "Gruyère râpé" => array("quantity" => 50, "unit" => "grammes")
            ),
            "Tarte aux pommes" => array(
                "Pâte feuilletée" => array("quantity" => 1, "unit" => "piece"),
                "Pommes" => array("quantity" => 3, "unit" => "piece"),
                "Sucre" => array("quantity" => 100, "unit" => "grammes"),
                "Cannelle" => array("quantity" => 1, "unit" => "pincée"),
                "Beurre" => array("quantity" => 50, "unit" => "grammes")
            )
        );

        foreach ($recipes as $recette => $ingredients) {
            $temp_r = Recette::where('name', $recette)->first();
            foreach ($ingredients as $name => $data) {
                $element = Element::where('name',$name)->first();
                    //$temp_r->elements()->attach($element,['quantity'=> $data['quantity']]);
            }

        }
        return redirect('/Ingredients');


    }

    public function render()
    {
        return view('livewire.recettes.suggestions');
    }
}
