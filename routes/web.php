<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Models\Task;


// Route::get('/', function () {return view('welcome');});
Route::get('/', [TaskController::class, 'show'])->name('welcome');

// Route::get('/addtask', function () {return view('addtask');})->name('addtask');
Route::post('/addtask', [TaskController::class, 'store'])->name('addtask');

Route::get('/tasks/edit/{id}', [TaskController::class, 'edit'])->name('task-edit');
Route::get('/tasks/{id}', [TaskController::class, 'update'])->name('task-updade');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
