<?php

namespace App\Http\Livewire\Calendar;


use App\Models\Element;
use App\Models\Repas;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListRepasForDay extends Component
{
    public Carbon $day;
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
                $disponibles[$inventaire->name] += $inventaire->stock;
            }
            else
            {
                $disponibles[$inventaire->name] = $inventaire->stock;
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
                if (array_key_exists($element->name, $besoins))
                {
                    $besoins[$element->name] += $element->pivot->quantity;
                }
                else
                {
                    $besoins[$element->name] = $element->pivot->quantity;
                }
            }
            }
        }
        // $besoins =  ["Semoule" => 5.0]

        foreach ($besoins as $nom_besoin => $quantity_besoin)
        {
            if (array_key_exists($nom_besoin, $disponibles))
            {
                if ($disponibles[$nom_besoin]<$quantity_besoin){
                    $tobuy[$nom_besoin] = $quantity_besoin - $disponibles[$nom_besoin];
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
