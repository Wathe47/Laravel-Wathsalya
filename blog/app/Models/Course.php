<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'credits'];
    public $timestamps = true;

    // Many-to-many relationship with students
    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_courses')
            ->withPivot('status', 'enrollment_date', 'completion_date')
            ->withTimestamps();
    }
}
