<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaire extends Model
{
    use HasFactory;


    protected $fillable = ['name','unit','price','stock'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class)
            ->withPivot('pourcentage');
    }

    public function group_inventaire()
    {
        return $this->hasMany(GroupInventaire::class);
    }
}
