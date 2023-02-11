<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElementsRecettes extends Model
{
    use HasFactory;


    public function recettes()
    {
        return $this->belongsTo(Recette::class);
    }

    public function elements()
    {
        return $this->belongsTo(Element::class);
    }
}
