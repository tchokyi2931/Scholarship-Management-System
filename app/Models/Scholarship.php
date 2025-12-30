<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Student;

class Scholarship extends Model 
{
    use HasFactory;

    protected $table = 'scholarships';

    protected $guarded = [];

     public function students()
    {
        return $this->belongsToMany(Student::class, 'student_scholarship')
        ->withTimestamps();
    }
}

