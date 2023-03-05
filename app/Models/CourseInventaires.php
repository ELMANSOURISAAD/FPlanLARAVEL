<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseInventaires extends Model
{
    use HasFactory;
    public function courses()
    {
        return $this->belongsTo(Course::class);
    }

    public function inventaires()
    {
        return $this->belongsTo(Inventaire::class);
    }
}
