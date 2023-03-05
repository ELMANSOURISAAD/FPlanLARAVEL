<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    public function inventaires()
    {
        return $this->belongsToMany(Inventaire::class)
            ->withPivot(["quantity","unit"]);
    }

    public function group_inventaire()
    {
        return $this->hasMany(GroupInventaire::class);
    }


    public function users()
    {
        return $this->belongsToMany(User::class);

    }

    public function group_user()
    {
        return $this->hasMany(GroupUser::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
