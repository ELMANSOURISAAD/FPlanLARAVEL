<?php

namespace App\Http\Livewire\Calendar;


use App\Models\Repas;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListRepasForDay extends Component
{
    public Carbon $day;


    private function convertIngredient($ingredient, $amount, $start_unit, $end_unit) {
        if($start_unit == "grammes" && $end_unit == "kilogrammes"){
            // Convert to grams as the intermediate unit
            $grams = $amount * 1;
            // Convert from grams to the desired unit
            $result = $grams / 1000;
            return $result;
        }
        if($start_unit == "kilogrammes" && $end_unit == "grammes"){
            // Convert to grams as the intermediate unit
            $grams = $amount * 1000;
            // Convert from grams to the desired unit
            $result = $grams / 1;
            return $result;
        }
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

        // Check if ingredient is in the array and if both units are valid
        if (array_key_exists(strtolower($ingredient), $conversions) && array_key_exists(strtolower($start_unit), $conversions[strtolower($ingredient)]) && array_key_exists(strtolower($end_unit), $conversions[strtolower($ingredient)])) {

            // Convert to grams as the intermediate unit
            $grams = $amount * $conversions[strtolower($ingredient)][strtolower($start_unit)];

            // Convert from grams to the desired unit
            $result = $grams / $conversions[strtolower($ingredient)][strtolower($end_unit)];

            return $result;
        } else {
            return false;
        }
    }




    public function getRepasForDay($adate)
    {
        $userId = Auth::id();
        $repas = User::find($userId)->repas()
        ->where('date_repas', $adate->toDateString())
        ->get();
        return $repas;
    }



    public function DeleteRepasFromDay($id_repas)
    {
        Repas::destroy($id_repas);
    }


    public function getRepasStatsForDay($adate)
    {
        $stats = [
            "Total" => 0,
        ];
        $userId = Auth::id();
        $repas = User::find($userId)->repas()
            ->where('date_repas', $adate->toDateString())->get();


        foreach ($repas as $bruh)
        {
            if($bruh->recette)
            $stats['Total'] += ($bruh->recette->price);
        }


        return $stats;
    }
    public function MissingInventory($adate)
    {

        $tobuy = [];
        $disponibles = [];
        $besoins = [];
        $userId = Auth::id();

        $inventaires = User::find($userId)->inventaires()->get();
        foreach ($inventaires as $inventaire)
        {


            if (array_key_exists($inventaire->name, $disponibles))
            {
                $disponibles[$inventaire->name] += $this->convertIngredient($inventaire->name,$inventaire->stock,$inventaire->unit,'grammes');
            }
            else
            {
                $disponibles[$inventaire->name] = $this->convertIngredient($inventaire->name,$inventaire->stock,$inventaire->unit,'grammes');
            }

        }
        // $disponibles = ["Poulet" => 0.2]

        $repas = User::find($userId)->repas()
            ->where('date_repas', $adate->toDateString())->get();

        foreach ($repas as $onerepas)
        {
            if($onerepas->recette)
            {
            foreach ($onerepas->recette->elements()->get() as $element)
            {
                // convert to gramme
                // convertIngredient("poivre", 1, "pincée", "cuillères à café")


                if (array_key_exists($element->name, $besoins))
                {
                    $besoins[$element->name] += $this->convertIngredient($element->name,$element->pivot->quantity,$element->unit,'grammes');
                }
                else
                {
                    $besoins[$element->name] = $this->convertIngredient($element->name,$element->pivot->quantity,$element->unit,'grammes');
                }
            }
            }
        }
        // $besoins =  ["Semoule" => 5.0]

        foreach ($besoins as $nom_besoin => $quantity_besoin)
        {
            // convert to gramme

            // end converstion
            if (array_key_exists($nom_besoin, $disponibles))
            {
                if ($disponibles[$nom_besoin]<$quantity_besoin){
                    $tobuy[$nom_besoin] = $quantity_besoin - $disponibles[$nom_besoin];
                    //  converting to Kgrams
                    $tobuy[$nom_besoin] =  (float)(1/1000) *  (float)$tobuy[$nom_besoin];
                }

            }
            else
            {
                $tobuy[$nom_besoin]= $quantity_besoin;

            }

        }

        return $tobuy;
    }



    public function render()
    {
        return view('livewire.calendar.list-repas-for-day',[
            'repas' => $this->getRepasForDay($this->day),
            'stats' => $this->getRepasStatsForDay($this->day),
            'MissingInventory' => $this->MissingInventory($this->day),
            'daterecu' => $this->day,
        ]);
    }
}
