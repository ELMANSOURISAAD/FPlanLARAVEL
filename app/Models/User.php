<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasFactory;
    public $table = 'user';

    protected $fillable = ['name','email','recette_id','password','group_id'];

    public function recettes()
    {
        return $this->hasMany(Recette::class);
    }

    public function elements()
    {
        return $this->hasMany(Element::class);
    }
    public function Inventaires()
    {
        return $this->hasMany(Inventaire::class);
    }
    public function Repas()
    {
        return $this->hasMany(Repas::class);
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class);

    }

    public function group_user()
    {
        return $this->hasMany(GroupUser::class);
    }

    public function SetPasswordAttribute($value){
    $this->attributes['password'] = bcrypt($value);
    }
}
