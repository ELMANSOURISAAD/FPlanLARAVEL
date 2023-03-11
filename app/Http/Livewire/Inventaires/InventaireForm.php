<?php

namespace App\Http\Livewire\Inventaires;

use App\Models\Inventaire;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class InventaireForm extends Component
{

    public Inventaire $inventaire;
    protected $rules = [
        'inventaire.name' => 'required|string|min:3',
        'inventaire.unit' => 'required|string|min:1',
        'inventaire.stock' => 'required|between:0,999'
    ];

    private function convertIngredient($ingredient, $amount, $start_unit, $end_unit) {
        $easy_convertion = ["kilogrammes","grammes","litres","centilitres","millilitres"];


        $conversions = array(
            "poivre" => array(
                "grammes" => 1,
                "kilogrammes" => 1000,
                "pincées" => 0.104167,
                "cuillères à café" => 1.66667,
                "cuillères à soupe" => 5,
            ),
            "cumin" => array(
                "grammes" => 1,
                "kilogrammes" => 1000,
                "pincées" => 0.5,
                "cuillères à café" => 5,
                "cuillères à soupe" => 15,
            ),
            "sel" => array(
                "grammes" => 1,
                "kilogrammes" => 1000,
                "pincées" => 0.354167,
                "cuillères à café" => 5.69167,
                "cuillères à soupe" => 17.075,
            ),
            "paprika" => array(
                "grammes" => 1,
                "kilogrammes" => 1000,
                "pincées" => 0.5,
                "cuillères à café" => 3,
                "cuillères à soupe" => 9,
            ),
            "curry" => array(
                "grammes" => 1,
                "kilogrammes" => 1000,
                "pincées" => 0.5,
                "cuillères à café" => 3,
                "cuillères à soupe" => 9,
            ),
            "herbes de provence" => array(
                "grammes" => 1,
                "kilogrammes" => 1000,
                "pincées" => 0.5,
                "cuillères à café" => 3,
                "cuillères à soupe" => 9,
            ),
            "cannelle" => array(
                "grammes" => 1,
                "kilogrammes" => 1000,
                "pincées" => 0.5,
                "cuillères à café" => 2.5,
                "cuillères à soupe" => 8,
            ),
            "gingembre" => array(
                "grammes" => 1,
                "kilogrammes" => 1000,
                "pincées" => 0.5,
                "cuillères à café" => 3.5,
                "cuillères à soupe" => 12,
            ),
            "coriandre" => array(
                "grammes" => 1,
                "kilogrammes" => 1000,
                "pincées" => 0.5,
                "cuillères à café" => 2.5,
                "cuillères à soupe" => 7,
            ),
            "piment de Cayenne" => array(
                "grammes" => 1,
                "kilogrammes" => 1000,
                "pincées" => 0.3,
                "cuillères à café" => 2,
                "cuillères à soupe" => 6,
            ),
            "curcuma" => array(
                "grammes" => 1,
                "kilogrammes" => 1000,
                "pincées" => 0.5,
                "cuillères à café" => 2.5,
                "cuillères à soupe" => 8,
            ),
            "cardamome" => array(
                "grammes" => 1,
                "kilogrammes" => 1000,
                "pincées" => 0.25,
                "cuillères à café" => 1.5,
                "cuillères à soupe" => 4,
            ),
            "muscade" => array(
                "grammes" => 1,
                "kilogrammes" => 1000,
                "pincées" => 0.5,
                "cuillères à café" => 2.5,
                "cuillères à soupe" => 7,
            ),
            // liquids
            'eau' => array(
                'litres' => 1,
                'centilitres' => 0.01,
                "millilitres" => 0.001,
            ),
            "huile d'olive" => array(
                'litres' => 1,
                'centilitres' => 0.01,
                "millilitres" => 0.001,
            ),
            // end spices , liquid start here
            'ail' => array(
                'gousses' => 3, // poids moyen d'une gousse d'ail en grammes
                'grammes' => 1,
                "kilogrammes" => 1000,
            ),
            'sucre' => array(
                'grammes' => 1,
                "kilogrammes" => 1000,
                'cuillères à soupe' => 12.5,
                'cuillères à café' => 4.2
            ),
            'farine' => array(
                'grammes' => 1,
                "kilogrammes" => 1000,
                'tasses' => 120,
                'cuillères à soupe' => 7.5,
                'cuillères à café' => 2.5
            ),
            'riz' => array(
                'grammes' => 1,
                "kilogrammes" => 1000,
                'tasses' => 180
            ),
            'chocolat' => [
                'grammes' => 1,
                "kilogrammes" => 1000,
                'carres' => 10,
            ],
        );


        // on ajoute dans le tableau si on peut calculer facilement regardless l'ingredient , ex: kg -> gram
        if(in_array($start_unit,$easy_convertion) && in_array($end_unit,$easy_convertion))
        {

            $temp = array(strtolower($ingredient) => array(
                "grammes" => 1,
                "kilogrammes" => 1000,
                "litres" => 1,
                "centilitres" => 0.01,
                "millilitres" => 0.001,
            ));

            $conversions = array_merge($conversions , $temp);

        }


        // Check if ingredient is in the array and if both units are valid
        if (array_key_exists(strtolower($ingredient), $conversions) && array_key_exists(strtolower($start_unit), $conversions[strtolower($ingredient)]) && array_key_exists(strtolower($end_unit), $conversions[strtolower($ingredient)])) {

            // Convert to grams as the intermediate unit
            $grams = $amount * $conversions[strtolower($ingredient)][strtolower($start_unit)];

            // Convert from grams to the desired unit
            $result = $grams / $conversions[strtolower($ingredient)][strtolower($end_unit)];

            return floatval($result);

        } else {
            return 0;
        }
    }

    public function save(){
        $this->validate();
        $id = $this->inventaire->id;
        $name = $this->inventaire->name;
        $old_inventaire = Inventaire::find($id);

        $old_quantity = $old_inventaire->stock;
        $old_unit = $old_inventaire->unit;

        ($new_quantity = $this->inventaire->stock);
        ($new_unit = $this->inventaire->unit);

        if($new_unit==$old_unit)
        {
            $difference = $new_quantity - $old_quantity ;
        }
        else
        {
            $difference = $this->convertIngredient($name,$new_quantity,$new_unit,'grammes') -  $this->convertIngredient($name,$old_quantity,$old_unit,'grammes') ;
        }
       

        if($difference>0)
        {
            $courses = $old_inventaire->courses;
            // supposed to be one
            foreach ($courses as $course ) {
                $unit = $course->pivot->unit;
                if($unit !== $new_unit)
                {
                    
                    $course->pivot->quantity = $this->convertIngredient($name,$course->pivot->quantity,$unit,'grammes') - $this->convertIngredient($name,$difference,$new_unit,'grammes');
                    
                    $course->pivot->quantity = $this->convertIngredient($name,$course->pivot->quantity,'grammes',$unit);
                    
                }
                else
                {
                    $course->pivot->quantity = $course->pivot->quantity - $difference;

                }
                $course->pivot->save();
                if($course->pivot->quantity<=0)
                {
                    ($course->delete());
                }
                
            }

        }
        $this->inventaire->save();
        $this->emit('InventaireUpdated');
    }
    public function render()
    {
        $userId = Auth::id();
        $elements = User::find($userId)->elements;
        return view('livewire.inventaires.inventaire-form', [
            'elements' => $elements
        ]);

    }
}
