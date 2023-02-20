<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    use HasFactory;

    protected $fillable = ['name','unit','price'];
    public function recettes()
    {
        return $this->belongsToMany(Recette::class)
            ->withPivot('quantity');
    }

    public function element_recette()
    {
        return $this->hasMany(ElementRecette::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
