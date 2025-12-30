<?php

use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');

Route::get('/student', function () {
    return redirect('/students');
});

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');

Route::middleware('auth')->group(function () {
    // Scholarships for view only
    Route::get('/scholarships', [ScholarshipController::class, 'index']);
    Route::get('/scholarships/create', [ScholarshipController::class, 'create'])->middleware('admin'); // Must be BEFORE {scholarship}
    Route::get('/scholarships/{scholarship}', [ScholarshipController::class, 'show']);

    // Students for view only
    Route::get('/students', [StudentController::class, 'index']);
    Route::get('/students/create', [StudentController::class, 'create'])->middleware('admin'); // Must be BEFORE {student}
    Route::get('/students/{student}', [StudentController::class, 'show']);

    // Attachment views
    Route::get('/students/{student}/attach', [StudentController::class, 'attach']);
    Route::get('/scholarships/{scholarship}/attach', [ScholarshipController::class, 'attach']);       
});

// Admin-only routes
Route::middleware(['auth', 'admin'])->group(function () {
    // Scholarship CRUD
    Route::post('/scholarships', [ScholarshipController::class, 'store']);
    Route::get('/scholarships/{scholarship}/edit', [ScholarshipController::class, 'edit']);
    Route::patch('/scholarships/{scholarship}', [ScholarshipController::class, 'update']);
    Route::delete('/scholarships/{scholarship}', [ScholarshipController::class, 'destroy']);

    // Student CRUD
    Route::post('/students', [StudentController::class, 'store']);
    Route::get('/students/{student}/edit', [StudentController::class, 'edit']);
    Route::patch('/students/{student}', [StudentController::class, 'update']);
    Route::delete('/students/{student}', [StudentController::class, 'destroy']);

    // Attachment actions
    Route::post('/students/{student}/scholarships', [StudentController::class, 'attachScholarship']);
    Route::post('/students/{student}/scholarships/detach', [StudentController::class, 'detachScholarship']);
    Route::post('/scholarships/{scholarship}/students', [ScholarshipController::class, 'attachStudent']);
    Route::post('/scholarships/{scholarship}/students/detach', [ScholarshipController::class, 'detachStudent']);

    // User management routes
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/create', [UserController::class, 'create']);
    Route::post('/users', [UserController::class, 'store']);
    Route::get('/users/{user}', [UserController::class, 'show']);
    Route::get('/users/{user}/edit', [UserController::class, 'edit']);
    Route::patch('/users/{user}', [UserController::class, 'update']);
    Route::delete('/users/{user}', [UserController::class, 'destroy']);
});