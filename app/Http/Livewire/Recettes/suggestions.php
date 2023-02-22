<?php

namespace App\Http\Livewire\Recettes;

use App\Models\Element;
use App\Models\Recette;
use Illuminate\Support\Facades\Auth;
use LivewireUI\Modal\ModalComponent;

class suggestions extends ModalComponent
{


    public function Go()
    {
        Recette::getQuery()->delete();
        Element::getQuery()->delete();

        $ingredients = array(
            "Beurre" => array("price" => 0.250, "unit" => "grammes"),
            "Champignons" => array("price" => 15.00, "unit" => "kilogrammes"),
            "Huile d'olive" => array("price" => 12.00, "unit" => "litres"),
            "Oignons" => array("price" => 1.50, "unit" => "kilogrammes"),
            "Farine" => array("price" => 0.70, "unit" => "kilogrammes"),
            "Sucre" => array("price" => 0.80, "unit" => "kilogrammes"),
            "Sel" => array("price" => 0.01, "unit" => "grammes"),
            "Poivre" => array("price" => 0.03, "unit" => "grammes"),
            "Bicarbonate de soude" => array("price" => 2.00, "unit" => "kilogrammes"),
            "Levure chimique" => array("price" => 1.50, "unit" => "kilogrammes"),
            "Café moulu" => array("price" => 5.00, "unit" => "kilogrammes"),
            "Thé" => array("price" => 20.00, "unit" => "kilogrammes"),
            "Eau" => array("price" => 0.001, "unit" => "litres"),
            "Lait" => array("price" => 0.60, "unit" => "litres"),
            "Crème fraîche" => array("price" => 1.50, "unit" => "litres"),
            "Cacao en poudre" => array("price" => 5.00, "unit" => "kilogrammes"),
            "Noix de muscade" => array("price" => 25.00, "unit" => "kilogrammes"),
            "Cannelle" => array("price" => 10.00, "unit" => "kilogrammes"),
            "Vanille en poudre" => array("price" => 100.00, "unit" => "kilogrammes"),
            "Paprika" => array("price" => 12.00, "unit" => "kilogrammes"),
            "Curcuma" => array("price" => 18.00, "unit" => "kilogrammes"),
            "Moutarde" => array("price" => 2.00, "unit" => "kilogrammes"),
            "Vinaigre balsamique" => array("price" => 10.00, "unit" => "litres"),
            "Sauce soja" => array("price" => 7.00, "unit" => "litres"),
            "Ketchup" => array("price" => 3.00, "unit" => "litres"),
            "Mayonnaise" => array("price" => 4.00, "unit" => "litres"),
            "Miel" => array("price" => 5.00, "unit" => "kilogrammes"),
            "Pâte de tomate" => array("price" => 2.00, "unit" => "kilogrammes"),
            "Ail" => array("price" => 0.200, "unit" => "grammes"),
            "Persil" => array("price" => 0.150, "unit" => "grammes"),
            "Citron" => array("price" => 0.50, "unit" => "unité"),
            "Crème pâtissière" => array("price" => 1.50, "unit" => "litres"),
            "Gruyère râpé" => array("price" => 15.00, "unit" => "kilogrammes"),
            "Pommes de terre" => array("price" => 0.50, "unit" => "kilogrammes"),
            "Carottes" => array("price" => 1.00, "unit" => "kilogrammes"),
            "Céleri" => array("price" => 1.20, "unit" => "kilogrammes"),
            "Poireaux" => array("price" => 1.50, "unit" => "kilogrammes"),
            "Chou-fleur" => array("price" => 2.00, "unit" => "unité"),
        );
        foreach ($ingredients as $ingredient=>$data) {
            $element = new Element;
            $element->name = $ingredient;
            $element->price = $data['price'];
            $element->unit = $data['unit'];
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
                    $temp_r->elements()->attach($element,['quantity'=> $data['quantity']]);
            }

        }
        return redirect('/Ingredients');


    }

    public function render()
    {
        return view('livewire.recettes.suggestions');
    }
}
