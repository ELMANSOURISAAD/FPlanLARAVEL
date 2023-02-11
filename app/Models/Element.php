<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function recettes()
    {
        return $this->belongsToMany(Recette::class);
    }

    public function element_recette()
    {
        return $this->hasMany(ElementsRecettes::class);
    }
}
