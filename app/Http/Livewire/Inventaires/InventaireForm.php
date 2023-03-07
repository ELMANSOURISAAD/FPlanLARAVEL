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

    public function save(){
        $this->validate();
        $id = $this->inventaire->id;

        $old_inventaire = Inventaire::find($id);

        $old_quantity = $old_inventaire->stock;

        ($new_quantity = $this->inventaire->stock);
        $difference = $new_quantity - $old_quantity ;
        if($difference>0)
        {
            $courses = $old_inventaire->courses;
            // supposed to be one
            foreach ($courses as $course ) {
                $course->pivot->quantity = $course->pivot->quantity - $difference;
                if($course->pivot->quantity<=0)
                {
                    $course->delete();
                }
                $course->pivot->save();
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
