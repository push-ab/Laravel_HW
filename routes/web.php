<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::middleware(['auth'])->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    
    
    Route::get('/groups', [GroupController::class, 'index'])->name('groups.index');
    Route::get('/groups/create', [GroupController::class, 'create'])->name('groups.create');
    Route::post('/groups', [GroupController::class, 'store'])->name('groups.store');
    Route::get('/groups/{group}', [GroupController::class, 'show'])->name('groups.show');

  
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/groups/{group}/students/create', [StudentController::class, 'create'])->name('groups.students.create');
    Route::post('/groups/{group}/students', [StudentController::class, 'store'])->name('groups.students.store');
    Route::get('/groups/{group}/students/{student}', [StudentController::class, 'show'])->name('groups.students.show');
});