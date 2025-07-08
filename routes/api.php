<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;

Route::get('/api/tareas', [TareaController::class, 'index']);
Route::post('/api/tareas', [TareaController::class, 'store']);
Route::put('/api/tareas/{id}', [TareaController::class, 'update']);
Route::delete('/api/tareas/{id}', [TareaController::class, 'destroy']);