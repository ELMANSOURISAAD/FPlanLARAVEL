<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function repas()
    {
        return $this->belongsTo(Repas::class);
    }


    public function inventaires()
    {
        return $this->belongsToMany(Inventaire::class)
        ->withPivot(["quantity","unit"]);
    }

    public function course_inventaires()
    {
        return $this->hasMany(CourseInventaires::class);
    }


}
