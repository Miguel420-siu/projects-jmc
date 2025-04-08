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

// Rutas para usuarios
Route::resource('users', UserController::class)->middleware(['auth', 'role:Admin']);

// Rutas para tareas
Route::get('/tareas', [TareaController::class, 'index'])->name('tareas.index');
Route::get('/tareas/create', [TareaController::class, 'create'])->name('tareas.create')->middleware(['auth', 'role:Admin']);
Route::post('/tareas', [TareaController::class, 'store'])->name('tareas.store')->middleware(['auth', 'role:Admin']);
Route::get('/tareas/{tarea}', [TareaController::class, 'show'])->name('tareas.show');
Route::get('/tareas/{tarea}/edit', [TareaController::class, 'edit'])->name('tareas.edit')->middleware(['auth', 'role:Admin']);
Route::put('/tareas/{tarea}', [TareaController::class, 'update'])->name('tareas.update')->middleware(['auth', 'role:Admin']);
Route::delete('/tareas/{tarea}', [TareaController::class, 'destroy'])->name('tareas.destroy')->middleware(['auth', 'role:Admin']);
Route::get('/tareas/{tarea}/estado', [TareaController::class, 'estado'])->name('tareas.estado')->middleware(['auth', 'role:Colaborador']);
Route::put('/tareas/{tarea}/estado', [TareaController::class, 'updateEstado'])->name('tareas.updateEstado')->middleware(['auth', 'role:Colaborador']);
Route::post('/tareas/{tarea}/asignar-usuario', [TareaController::class, 'asignarUsuario'])->name('tareas.asignarUsuario')->middleware('role:Admin');
Route::patch('/tareas/{tarea}/cambiar-estado', [TareaController::class, 'cambiarEstado'])->name('tareas.cambiarEstado');


// Rutas para proyectos
Route::get('/proyectos', [ProyectosController::class, 'index'])->name('proyectos.index');
Route::get('/proyectos/create', [ProyectosController::class, 'create'])->name('proyectos.create')->middleware(['auth', 'role:Admin']);
Route::post('/proyectos', [ProyectosController::class, 'store'])->name('proyectos.store')->middleware(['auth', 'role:Admin']);
Route::get('/proyectos/{proyecto}/edit', [ProyectosController::class, 'edit'])->name('proyectos.edit')->middleware(['auth', 'role:Admin']);
Route::put('/proyectos/{proyecto}', [ProyectosController::class, 'update'])->name('proyectos.update')->middleware(['auth', 'role:Admin']);
Route::delete('/proyectos/{proyecto}', [ProyectosController::class, 'destroy'])->name('proyectos.destroy')->middleware(['auth', 'role:Admin']);

// Rutas para administradores
Route::middleware('role:Admin')->group(function () {
    Route::post('/proyectos/{proyecto}/asignar-usuario', [ProyectosController::class, 'asignarUsuario'])->name('proyectos.asignarUsuario');
    Route::post('/proyectos/{proyecto}/eliminar-usuario', [ProyectosController::class, 'eliminarUsuario'])->name('proyectos.eliminarUsuario');
});

// Rutas accesibles para todos los usuarios
Route::get('/proyectos/{proyecto}', [ProyectosController::class, 'show'])->name('proyectos.show');
Route::patch('/proyectos/{proyecto}/cambiar-estado', [ProyectosController::class, 'cambiarEstado'])->name('proyectos.cambiarEstado');

Route::get('/tareas', [TareaController::class, 'index'])->name('tareas.index');

//rutas para comentarios
Route::post('/comentarios', [ComentarioController::class, 'store'])->name('comentarios.store');

//ruta para dashboard 
Route::get('/dashboard', function () {
    return view('dashboard');
});

