<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProyectosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/register', [RegisterController::class, 'show']);
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'show']);
Route::post('/login', [LoginController::class, 'login']);

Route::get('/logout', [LogoutController::class, 'logout']);

Route::resource('users', UserController::class);
// Rutas para tareas
Route::resource('tareas', TareaController::class);
Route::get('/tareas', [TareaController::class, 'index'])->name('tareas.index');
// Rutas para proyectos
Route::resource('proyectos', ProyectosController::class);

Route::get('/tareas', [TareaController::class, 'index'])->name('tareas.index');

//rutas para comentarios
Route::post('/comentarios', [ComentarioController::class, 'store'])->name('comentarios.store');

