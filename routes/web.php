<?php

use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\ProyectosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rutas para tareas
Route::resource('tareas', TareaController::class);

// Rutas para proyectos
Route::resource('proyectos', ProyectosController::class);




