<?php

namespace App\Http\Livewire\Groups\calendar;



use App\Models\Course;
use App\Models\Group;
use App\Models\Inventaire;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CoursesForDay extends Component
{
    public Carbon $day;
    public Group $group;
    public int $group_id;


    public function mount(){
        $this->group_id = $this->group->id;
    }



    public function MissingInventory($adate)
    {

        $tobuy = [];
        $disponibles = [];
        $besoins = [];
        $userId = Auth::id();

        $inventaires = ($this->group->inventaires);

        foreach ($inventaires as $inventaire)
        {

            if (array_key_exists($inventaire->name, $disponibles))
            {

                $disponibles[$inventaire->name]['quantity'] += $inventaire->pivot->quantity;

            }
            else
            {
                $disponibles[$inventaire->name]['quantity'] = $inventaire->pivot->quantity;
                $disponibles[$inventaire->name]['unit'] = $inventaire->pivot->unit;
                $disponibles[$inventaire->name]['name'] = $inventaire->name;
                $disponibles[$inventaire->name]['id_inventaire'] = $inventaire->id;
            }

        }



        foreach ($inventaires as $inventaire)
        {

            foreach ($inventaire->courses as $course) {

            if (array_key_exists($inventaire->name, $disponibles))
            {

                $disponibles[$inventaire->name]['quantity'] += $course->pivot->quantity;

            }

            }


        }

        $disponibles_butnotshared = [];
        $inventaires = User::find($userId)->inventaires()->get();
        foreach ($inventaires as $inventaire)
        {

            if (array_key_exists($inventaire->name, $disponibles_butnotshared))
            {

                $disponibles_butnotshared[$inventaire->name]['quantity'] += $inventaire->stock;

            }
            else
            {
                $disponibles_butnotshared[$inventaire->name]['quantity'] = $inventaire->stock;
                $disponibles_butnotshared[$inventaire->name]['unit'] = $inventaire->unit;
                $disponibles_butnotshared[$inventaire->name]['name'] = $inventaire->name;
                $disponibles_butnotshared[$inventaire->name]['id_inventaire'] = $inventaire->id;

            }

        }



        $repas = User::find($userId)->repas()
        ->where('date_repas','<=', $adate->toDateString())
        ->where('group_id',$this->group_id)
        ->get();


        if(!$repas->isEmpty())
        {

        foreach ($repas as $onerepas)
        {

            if($onerepas->recette)
            {
            foreach ($onerepas->recette->elements()->get() as $element)
            {

                if ((array_key_exists($element->name, $besoins)) ){
                    $besoins[$element->name]['quantity']  += $element->pivot->quantity;
                }
                else
                {
                $besoins[$element->name]['quantity']  = $element->pivot->quantity;
                $besoins[$element->name]['unit'] = $element->unit;
                $besoins[$element->name]['name'] = $element->name;
                $besoins[$element->name]['price'] = $element->price;
                $besoins[$element->name]['repas_id'] = $onerepas->id;
                }

            }

            }
        }

        }


        // $besoins =  ["Semoule" => 5.0]






            foreach ($besoins as $nom_besoin => $besoin_data) {

                                if ((array_key_exists($nom_besoin, $disponibles)) )
                            {

                                $dispo_grammes = $disponibles[$nom_besoin]['quantity'];
                                $besoin_grammes = $besoin_data['quantity'];

                                if($disponibles[$nom_besoin]['unit'] !== $besoin_data['unit'])
                                {
                                $dispo_grammes = $this->convertIngredient($disponibles[$nom_besoin]['name'],$disponibles[$nom_besoin]['quantity'],$disponibles[$nom_besoin]['unit'],"grammes");
                                $besoin_grammes = $this->convertIngredient($besoin_data['name'],$besoin_data['quantity'],$besoin_data['unit'],"grammes");
                                }
                                if($dispo_grammes < $besoin_grammes){

                                        $tobuy[$nom_besoin]['quantity'] = $besoin_grammes - $dispo_grammes;
                                        $tobuy[$nom_besoin]['quantity_g'] = $besoin_grammes - $dispo_grammes;
                                        if($disponibles[$nom_besoin]['unit'] !== $besoin_data['unit'])
                                        {
                                            $tobuy[$nom_besoin]['quantity'] = $this->convertIngredient($disponibles[$nom_besoin]['name'],$tobuy[$nom_besoin]['quantity'],"grammes",$disponibles[$nom_besoin]['unit']);
                                        }
                                        $tobuy[$nom_besoin]['unit'] = $disponibles[$nom_besoin]['unit'];
                                        $tobuy[$nom_besoin]['id_inventaire'] = $disponibles[$nom_besoin]['id_inventaire'];
                                        $tobuy[$nom_besoin]['price'] = $besoin_data['price'];
                                        $tobuy[$nom_besoin]['id_repas'] = $besoin_data['repas_id'];
                                    }

                            }
                            elseif ((array_key_exists($nom_besoin, $disponibles_butnotshared)) )
                            {
                                $tobuy[$nom_besoin]['quantity']= $besoin_data['quantity'];
                                $tobuy[$nom_besoin]['quantity_g']= $besoin_data['quantity'];
                                $tobuy[$nom_besoin]['unit']= $disponibles_butnotshared[$nom_besoin]['unit'];
                                $tobuy[$nom_besoin]['name'] = $besoin_data['name'];
                                if($tobuy[$nom_besoin]['unit'] !== $besoin_data['unit'])
                                {
                                            $tobuy[$nom_besoin]['quantity'] = $this->convertIngredient($tobuy[$nom_besoin]['name'],$tobuy[$nom_besoin]['quantity'],$besoin_data['unit'],$tobuy[$nom_besoin]['unit']);
                                }

                                $tobuy[$nom_besoin]['id_inventaire'] = 0;
                                $tobuy[$nom_besoin]['price'] = $besoin_data['price'];
                                $tobuy[$nom_besoin]['id_repas'] = $besoin_data['repas_id'];
                            }
                            else
                            {
                                $tobuy[$nom_besoin]['quantity']= $besoin_data['quantity'];
                                $tobuy[$nom_besoin]['quantity_g']= $besoin_data['quantity'];
                                $tobuy[$nom_besoin]['unit']= $besoin_data['unit'];
                                $tobuy[$nom_besoin]['name'] = $besoin_data['name'];
                                $tobuy[$nom_besoin]['id_inventaire'] = 0;
                                $tobuy[$nom_besoin]['price'] = $besoin_data['price'];
                                $tobuy[$nom_besoin]['id_repas'] = $besoin_data['repas_id'];
                            }
            }





        return $tobuy;

    }


    public function share($inventaire,$quantity){

        $old_quantity = 0;
        // get already shared quantity
        if($inventaire->groups)
        {

            foreach ($inventaire->groups()->get() as $share) {
                    $old_quantity += ($share->pivot->quantity);
            }
        }



         if(($quantity + $old_quantity)  <= $inventaire->stock)
        {
                        if($inventaire->groups()->find($this->group))
                        {

                            $t = $inventaire->groups()->find($this->group);
                            $t->pivot->quantity += $quantity;
                            $t->pivot->save();
                        }
                        else
                        {

                        ($inventaire->groups()->attach($this->group, ['quantity'=> $quantity , 'unit'=> $inventaire->unit ]));
                        }


                        $this->emit('InventaireShared');
        }
    }

    public function CreateCourseDay($cumul)
    {

        if($cumul)
        {$listedecourse = $this->MissingInventory($this->day);}
        else
        {$listedecourse = $this->MissingInventoryNOCUMUL($this->day);}


        foreach ($listedecourse as $name => $data) {

            $invent = User::find(Auth::id())->inventaires()->having('name','=',$name)->get();
           if(!$invent->IsEmpty())
           {
            $data['id_inventaire'] = $invent->first()->id;
           }

            if($data['id_inventaire'] == 0)
            {
                $this->CreateCourse($data['id_inventaire'],$name,$data['quantity'],$data['unit'],$data['id_repas']);
            }
            else
            {

                $inventaire = $invent->first();
                $old_quantity = 0;
                        // get already shared quantity
                        if($inventaire->groups)
                        {

                            foreach ($inventaire->groups()->get() as $share) {
                                    $old_quantity += ($share->pivot->quantity);
                            }
                        }

                $unit = $inventaire -> unit;
                $stock = $inventaire -> stock;

                if($unit !== $data['unit'])
                {
                    $stock = $this->convertIngredient($name,$stock,$unit,$data['unit']);
                }


                // le stock est a l'unit??" de la quantit?? qu'on souhaite ajout??

                if($stock >= ($data['quantity'] +  $old_quantity))
                {
                    // on converti  en unit?? de stock avant de partager
                    $this->share($inventaire, $this->convertIngredient($name,$data['quantity'],$data['unit'],$unit) );
                }
                else
                {
                    $notsharedquantity = $stock - $old_quantity;
                    if($notsharedquantity>0)
                    {
                        // si on a du stock non partag??
                        $this->share($inventaire, $this->convertIngredient($name,$notsharedquantity,$data['unit'],$unit) );
                        $course = $data['quantity'] - $this->convertIngredient($name,$notsharedquantity,$unit,$data['unit']);
                        $this->CreateCourse($data['id_inventaire'],$name,$course,$data['unit'],$data['id_repas']);

                    }
                    else
                    {
                        // pas de stock a partager
                        $this->CreateCourse($data['id_inventaire'],$name,$data['quantity'],$data['unit'],$data['id_repas']);
                    }
                }


            }

        }

        $this->emit('CourseAdded');
       // $this->redirect('/Inventaires');
    }

    private function CreateCourse($id_inventaire,$name,$quantity,$unit,$id_repas)
    {


        if($id_inventaire == 0)
        {
            $inventaire = new Inventaire;
            $inventaire->name = $name;
            $inventaire->stock = 0;
            $inventaire->user_id = Auth::id();

            $inventaire->unit = $unit;
            $inventaire->save();
            $id_inventaire = $inventaire->id;
        }

        $inventaire = Inventaire::find($id_inventaire);

        ($courses = $inventaire->courses);


        if(!$courses->isEmpty())
        {
            // TO DO : CHECK UNIT
            foreach ($courses as $miss) {
                $miss->pivot->quantity = $miss->pivot->quantity +  $quantity;
                $miss->pivot->save();

            }


        }
        else
        {

            $course = new Course;
            $course->user_id = Auth::id();
            $course->repas_id = $id_repas;

            $course->save();
            $id_course = $course->id;
            ($inventaire->courses()->attach($id_course, ['quantity'=> $quantity , 'unit'=> $unit ]));
            // share with group

            $this->share($inventaire,$quantity);
            $inventaire->save();

        }



    }




    private function convertIngredient($ingredient, $amount, $start_unit, $end_unit) {
        $easy_convertion = ["kilogrammes","grammes","litres","centilitres","millilitres"];


        $conversions = array(
            "poivre" => array(
                "grammes" => 1,
                "kilogrammes" => 1000,
                "pinc??es" => 0.104167,
                "cuill??res ?? caf??" => 1.66667,
                "cuill??res ?? soupe" => 5,
            ),
            "cumin" => array(
                "grammes" => 1,
                "kilogrammes" => 1000,
                "pinc??es" => 0.5,
                "cuill??res ?? caf??" => 5,
                "cuill??res ?? soupe" => 15,
            ),
            "sel" => array(
                "grammes" => 1,
                "kilogrammes" => 1000,
                "pinc??es" => 0.354167,
                "cuill??res ?? caf??" => 5.69167,
                "cuill??res ?? soupe" => 17.075,
            ),
            "paprika" => array(
                "grammes" => 1,
                "kilogrammes" => 1000,
                "pinc??es" => 0.5,
                "cuill??res ?? caf??" => 3,
                "cuill??res ?? soupe" => 9,
            ),
            "curry" => array(
                "grammes" => 1,
                "kilogrammes" => 1000,
                "pinc??es" => 0.5,
                "cuill??res ?? caf??" => 3,
                "cuill??res ?? soupe" => 9,
            ),
            "herbes de provence" => array(
                "grammes" => 1,
                "kilogrammes" => 1000,
                "pinc??es" => 0.5,
                "cuill??res ?? caf??" => 3,
                "cuill??res ?? soupe" => 9,
            ),
            "cannelle" => array(
                "grammes" => 1,
                "kilogrammes" => 1000,
                "pinc??es" => 0.5,
                "cuill??res ?? caf??" => 2.5,
                "cuill??res ?? soupe" => 8,
            ),
            "gingembre" => array(
                "grammes" => 1,
                "kilogrammes" => 1000,
                "pinc??es" => 0.5,
                "cuill??res ?? caf??" => 3.5,
                "cuill??res ?? soupe" => 12,
            ),
            "coriandre" => array(
                "grammes" => 1,
                "kilogrammes" => 1000,
                "pinc??es" => 0.5,
                "cuill??res ?? caf??" => 2.5,
                "cuill??res ?? soupe" => 7,
            ),
            "piment de Cayenne" => array(
                "grammes" => 1,
                "kilogrammes" => 1000,
                "pinc??es" => 0.3,
                "cuill??res ?? caf??" => 2,
                "cuill??res ?? soupe" => 6,
            ),
            "curcuma" => array(
                "grammes" => 1,
                "kilogrammes" => 1000,
                "pinc??es" => 0.5,
                "cuill??res ?? caf??" => 2.5,
                "cuill??res ?? soupe" => 8,
            ),
            "cardamome" => array(
                "grammes" => 1,
                "kilogrammes" => 1000,
                "pinc??es" => 0.25,
                "cuill??res ?? caf??" => 1.5,
                "cuill??res ?? soupe" => 4,
            ),
            "muscade" => array(
                "grammes" => 1,
                "kilogrammes" => 1000,
                "pinc??es" => 0.5,
                "cuill??res ?? caf??" => 2.5,
                "cuill??res ?? soupe" => 7,
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
                'cuill??res ?? soupe' => 12.5,
                'cuill??res ?? caf??' => 4.2
            ),
            'farine' => array(
                'grammes' => 1,
                "kilogrammes" => 1000,
                'tasses' => 120,
                'cuill??res ?? soupe' => 7.5,
                'cuill??res ?? caf??' => 2.5
            ),
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
    public function getRepasForDay($adate)
    {
        $userId = Auth::id();
        $repas = User::find($userId)->repas()
        ->where('date_repas', $adate->toDateString())
        ->where('group_id',$this->group_id)
        ->get();
        return $repas;
    }

    public function render()
    {

        return view('livewire.calendar.courses-for-day',[
            'repas' => $this->getRepasForDay($this->day),
            'daterecu' => $this->day,
            'MissingInventory' => $this->MissingInventory($this->day),
            'totalprice' => 0
        ]);
    }
}
