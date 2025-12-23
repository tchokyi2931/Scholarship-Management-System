<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'email',
        'student_id',
        'department',
        'user_id'
    ];
 
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scholarships()
    {
        return $this->belongsToMany(Scholarship::class)
        ->withTimestamp();
    }
}
