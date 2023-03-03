<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

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
