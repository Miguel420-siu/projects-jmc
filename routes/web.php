<?php

use App\Http\Controllers\TareaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LoginsController;

Route::get('/', function () {
    return view('welcome');
});

route::resource('tareas',TareaController::class);
route::resource('usuarios', UsuarioController::class);
route::resource('login', LoginsController::class);
