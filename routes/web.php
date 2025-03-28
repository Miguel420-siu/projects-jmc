<?php

use App\Http\Controllers\TareaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {
    return view('welcome');
});

route::resource('tareas',TareaController::class);
route::resource('usuarios', UsuarioController::class);
