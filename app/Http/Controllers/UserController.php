<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Tarea;
use App\Models\Proyectos;

class UserController extends Controller
{
    
    public function index(Request $request)
    {
        // Inicializa la consulta de usuarios
        $query = User::query();

        // Si existe un término de búsqueda, filtramos los resultados
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
        }

        // Obtener usuarios paginados
        $users = $query->paginate(10);

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente.');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente.');
    }

    public function dashboard()
    {
    // Obtener los proyectos asignados al usuario autenticado
    $proyectos = Proyectos::whereHas('usuarios', function ($query) {
        $query->where('user_id', auth()->id());
    })->get();

    // Calcular el total de proyectos y los estados
    $totalProyectos = $proyectos->count();
    $proyectosPendientes = $proyectos->where('estado', 'pendiente')->count();
    $proyectosEnProgreso = $proyectos->where('estado', 'en_progreso')->count();
    $proyectosCompletados = $proyectos->where('estado', 'completado')->count();
    
    if (auth()->user()->hasRole('Admin')) {
        // Si es administrador, obtiene todas las tareas
        $tareas = Tarea::all();
    } else {
        // Si es un usuario normal, obtiene solo las tareas asignadas a él
        $tareas = Tarea::where('asignado_a', auth()->id())->get();
    }

    // Calcular el total de tareas y los estados
    $totalTareas = $tareas->count();
    $tareasPendientes = $tareas->where('estado', 'pendiente')->count();
    $tareasEnProgreso = $tareas->where('estado', 'en_progreso')->count();
    $tareasCompletadas = $tareas->where('estado', 'completada')->count();

        // Pasar las variables a la vista
        return view('dashboard', compact(
            'totalProyectos',
            'proyectosPendientes',
            'proyectosEnProgreso',
            'proyectosCompletados',
            'totalTareas',
            'tareasPendientes',
            'tareasEnProgreso',
            'tareasCompletadas'
        ));
    }
}
