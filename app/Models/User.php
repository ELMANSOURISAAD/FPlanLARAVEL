<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasFactory;
    public $table = 'user';

    protected $fillable = ['name','email','recette_id','password'];

    public function recettes()
    {
        return $this->hasMany(Recette::class);
    }

    public function elements()
    {
        return $this->hasMany(Element::class);
    }

    public function SetPasswordAttribute($value){
    $this->attributes['password'] = bcrypt($value);
    }
}
