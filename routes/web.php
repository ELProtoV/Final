<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;

Route::get('/', function () {
    return view('Welcome');
});

Route::get('/todos', function () {
    return view('todos.index');
});


Route::get('/todos', [TodosController::class, 'index'])->name('todos');

Route::post('/todos', [TodosController::class, 'store'])->name('todos');

Route::patch('/todos', [TodosController::class, 'store'])->name('todos-edit');

Route::delete('/todos', [TodosController::class, 'store'])->name('todos-destroy');
