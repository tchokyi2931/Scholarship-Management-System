<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class scholarship extends Model 
{
    protected $table = 'scholarships';
    
    use HasFactory;
    
    protected $fillable = [
        'title',
        'description',
        'amount',
        
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class)
        ->withTimestamps();
    }
}

