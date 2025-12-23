<?php

use Illuminate\Support\Facades\Route;
use App\Models\Scholarship;
   

Route::get('/', function () {
    return view('home');
});

Route::get('/student', function () {
    return view('student');
});

Route::get('/scholarships', function () {
    return view('scholarships', [
        'scholarships' => Scholarship::all()
    ]);
});
 
Route::get('/scholarships/{id}', function ($id) {
    $scholarship = Scholarship::find($id);

    return view('scholarship', ['scholarship' => $scholarship]);
});
