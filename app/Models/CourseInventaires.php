<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseInventaires extends Model
{
    use HasFactory;

    protected $table = 'course_inventaire'; // to fix labeling issue
    public function courses()
    {
        return $this->belongsTo(Course::class);
    }

    public function inventaires()
    {
        return $this->belongsTo(Inventaire::class);
    }
}
