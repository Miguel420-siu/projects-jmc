<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Tarea;

class UserController extends Controller
{
    
    public function index(Request $request)
    {
        // Inicializa la consulta de usuarios
        $query = User::query();

        // Si existe un término de búsqueda, filtramos los resultados
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('rol', 'like', "%{$search}%");
            });
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
            'rol' => 'required|in:admin,supervisor,trabajador', // Solo los 3 roles correctos
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol' => $request->rol, // Guardamos el rol
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
            'rol' => 'required|in:admin,supervisor,trabajador', // Solo los 3 roles correctos
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'rol' => $request->rol, // Actualizamos el rol
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
        $proyectos = auth()->user()->proyectos;
        $tareas = Tarea::where('asignado_a', auth()->id())->get();

        return view('dashboard', compact('proyectos', 'tareas'));
    }
}
