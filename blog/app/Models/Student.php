<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
   use HasFactory;
   
   protected $fillable = ['name', 'email', 'age'];
   public $timestamps = true;

   // Many-to-many relationship with courses
   public function courses()
   {
      return $this->belongsToMany(Course::class, 'student_courses')
         ->withPivot('status', 'enrollment_date', 'completion_date')
         ->withTimestamps();
   }
}
