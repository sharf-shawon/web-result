<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'name', 'email', 'phone', 'address', 'date_of_birth', 'cgpa', 'image'];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_student', 'student_id', 'course_id');
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }
}
