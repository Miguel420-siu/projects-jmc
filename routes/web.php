<?php

use App\Http\Controllers\TareaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/tarea/create', [TareaController::class, 'create']);
Route::post('/tarea', [TareaController::class, 'store']);
