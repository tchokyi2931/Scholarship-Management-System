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

    return view('scholarships.index', [
        'scholarships' => Scholarship::all()
    ]);
});

Route::get('/scholarships/create', function(){
    return view('scholarships.create');
});

Route::get('/scholarships/{id}', function ($id) {
    $scholarship = Scholarship::find($id);

    return view('scholarships.show', ['scholarship' => $scholarship]);
});

Route::post('/scholarships', function() {
    //validation...
 
    Scholarship::create([
        'title' => request('title'),
        'amount' => request('amount'),
        'description' => request('description')
    ]);

    return redirect('/scholarships');
});