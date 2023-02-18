<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recette extends Model
{
    use HasFactory;


    protected $fillable = ['name'];


    public function getPriceAttribute()
    {
        $price = 0;
        foreach ($this->elements()->get() as $element)
        {
            $price +=  $element->price * $element->pivot->quantity ;
        }
        return $price;
    }

    public function elements()
    {
        return $this->belongsToMany(Element::class)
            ->withPivot('quantity');
    }

    public function element_recette()
    {
        return $this->hasMany(ElementsRecettes::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function Repas()
    {
        return $this->hasMany(Repas::class);
    }

}
