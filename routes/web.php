<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('groups_index');
});

Route::get('/groups', [GroupController::class, 'index'])->name('groups.index');
Route::get('/groups/create', [GroupController::class, 'create'])->name('groups.create');
Route::post('/groups', [GroupController::class, 'store'])->name('groups.store');
Route::get('/groups/{group}', [GroupController::class, 'show'])->name('groups.show');


Route::get('/students', [StudentController::class, 'index'])->name('students.index');

Route::get('/groups/{group}/students/create', [StudentController::class, 'create'])->name('groups.students.create');
Route::post('/groups/{group}/students', [StudentController::class, 'store'])->name('groups.students.store');
Route::get('/groups/{group}/students/{student}', [StudentController::class, 'show'])->name('groups.students.show');