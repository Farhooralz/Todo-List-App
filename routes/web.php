<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;

Route::get('/', function () {
    return view('home');
});

Route::resource("tasks", TasksController::class);
Route::patch('tasks/{task}/toggle', [TasksController::class, 'toggle'])->name('tasks.toggle');