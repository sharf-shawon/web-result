<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'code', 'semester_id'];

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }
}
