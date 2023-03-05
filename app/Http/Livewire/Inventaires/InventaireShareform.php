<?php

namespace App\Http\Livewire\Inventaires;

use App\Models\Inventaire;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class InventaireShareform extends Component
{

    public ?Inventaire $inventaire;
    public int $group = 0;
    public int $quantity;
    public int $unit;
    protected $rules = [
        'quantity' => 'required',
    ];


    public function share(){
        $this->validate();
        $quantity = 0;
        // get already shared quantity
        if($this->inventaire->groups)
        {

            foreach ($this->inventaire->groups()->get() as $share) {
                    $quantity += ($share->pivot->quantity);
            }
        }



         if(($this->quantity + $quantity)  <= $this->inventaire->stock)
        {
                        if($this->inventaire->groups()->find($this->group))
                        {
                            $t = $this->inventaire->groups()->find($this->group);
                            $t->pivot->quantity += $this->quantity;
                            $t->pivot->save();
                        }
                        else
                        {
                        ($this->inventaire->groups()->attach($this->group, ['quantity'=> $this->quantity , 'unit'=> $this->inventaire->unit ]));
                        }


                        $this->emit('InventaireShared');
        }
    }

    public function render()
    {
        $userId = Auth::id();
        $groups = User::find($userId)->ingroups;
        return view('livewire.inventaires.inventaire-shareform', [
            'groups' => $groups
        ]);
    }
}
