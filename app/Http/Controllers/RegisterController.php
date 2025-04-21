<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role; // Importa el modelo de roles
use Spatie\Permission\Models\Permission;

class RegisterController extends Controller
{
    public function show(){
        if (Auth::check()) {
            return redirect('/dashboard');
        }
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        // Crear el usuario con los datos validados
        $user = User::create($request->validated());

        // Asignar el rol seleccionado al usuario
        $role = $request->input('role');
        $user->assignRole($role);

        // Redirigir al login con un mensaje de éxito
        return redirect('/login')->with('success', 'Usuario registrado con éxito como ' . $role . '.');
    }
}
