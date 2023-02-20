<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElementRecette extends Model
{
    use HasFactory;
    protected $table = 'element_recette'; // to fix labeling issue


    public function recettes()
    {
        return $this->belongsTo(Recette::class);
    }

    public function elements()
    {
        return $this->belongsTo(Element::class);
    }
}
