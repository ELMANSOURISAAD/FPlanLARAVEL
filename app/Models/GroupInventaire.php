<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupInventaire extends Model
{
    use HasFactory;

    protected $table = 'group_inventaire'; // to fix labeling issue


    public function groups()
    {
        return $this->belongsTo(Group::class);
    }

    public function inventaires()
    {
        return $this->belongsTo(Inventaire::class);
    }
}
