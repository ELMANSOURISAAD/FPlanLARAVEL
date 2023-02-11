<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recette extends Model
{
    use HasFactory;


    public function elements()
    {
        return $this->belongsToMany(Element::class);
    }

    public function element_recette()
    {
        return $this->hasMany(ElementsRecettes::class);
    }

}
