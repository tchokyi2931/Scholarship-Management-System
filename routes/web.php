<?php

use App\Http\Controllers\ScholarshipController;
use Illuminate\Support\Facades\Route;
use App\Models\Scholarship;
   

Route::get('/', function () {
    return view('home');
});

Route::get('/student', function () {
    return view('student');
});

//index
Route::get('/scholarships',[ScholarshipController::class, 'index']);

// Route::get('/scholarships', function () {

//     return view('scholarships.index', [
//         'scholarships' => Scholarship::all()
//     ]);
// });

//Create
Route::get('/scholarships/create', [ScholarshipController::class, 'create']);

//show
Route::get('/scholarships/{scholarship}', [ScholarshipController::class, 'show']);

// Store
Route::post('/scholarships', [ScholarshipController::class, 'store']);

//edit
Route::get('/scholarships/{scholarship}/edit', [ScholarshipController::class, 'edit']);

//update
Route::patch('/scholarships/{scholarship}', [ScholarshipController::class, 'update']);

//delete
Route::delete('/scholarships/{scholarship}', [ScholarshipController::class, 'destroy']);