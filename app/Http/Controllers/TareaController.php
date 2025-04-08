<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Models\Proyectos;
use Illuminate\Http\Request;
use App\Models\User;

class TareaController extends Controller
{
    public function index(Request $request)
    {
        // Si el usuario es administrador, muestra todas las tareas
        if (auth()->user()->hasRole('Admin')) {
            $tareas = Tarea::query();
        } else {
            // Si es un usuario normal, muestra solo las tareas asignadas a él
            $tareas = Tarea::where('asignado_a', auth()->id());
        }

        // Aplicar filtros adicionales si existen
        if ($request->filled('nombre_proyecto')) {
            $tareas->where('nombre_proyecto', $request->nombre_proyecto);
        }

        if ($request->filled('estado')) {
            $tareas->where('estado', $request->estado);
        }

        if ($request->filled('prioridad')) {
            $tareas->where('prioridad', $request->prioridad);
        }

        if ($request->filled('fecha_fin_filter')) {
            $tareas->whereDate('fecha_limite', '<=', $request->fecha_fin_filter);
        }

        // Obtener las tareas filtradas
        $tareas = $tareas->get();

        // Obtener los proyectos para el filtro
        $proyecto = Proyectos::all();

        return view('tareas.index', compact('tareas', 'proyecto'));
    }

    public function create()
    {
        $proyectos = Proyectos::all();
        // Obtener solo los proyectos del usuario autenticado
        /*$proyectos = Proyectos::where('user_id', auth()->id())->get();*/
        
        return view('tareas.create', compact('proyectos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_proyecto' => 'required|string',
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha_limite' => 'required|date',
            'prioridad' => 'required|string|in:alta,media,baja',
        ]);

        Tarea::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'fecha_limite' => $request->fecha_limite,
            'prioridad' => $request->prioridad,
            'nombre_proyecto' => $request->nombre_proyecto,
            'user_id' => auth()->id(), // Asociar al usuario autenticado
        ]);

        return redirect()->route('tareas.index')->with('success', 'Tarea creada exitosamente.');
    }

    public function edit($id)
    {
        $tarea = Tarea::findOrFail($id); // Encuentra la tarea por su ID
        $proyectos = Proyectos::all(); // Obtén todos los proyectos disponibles
        $usuarios = User::all(); // Obtén todos los usuarios disponibles

        return view('tareas.edit', compact('tarea', 'proyectos', 'usuarios'));
    }

    public function update(Request $request, Tarea $tarea)
    {
        $request->validate([
            'nombre_proyecto' => 'required|string',
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha_limite' => 'required|date',
            'prioridad' => 'required|string',
            'estado' => 'required|in:pendiente,en_progreso,completada',
            'asignado_a' => 'nullable|exists:users,id', // Validar si el usuario existe
        ]);

        $tarea->update($request->all());

        return redirect()->route('tareas.index')->with('success', 'Tarea actualizada exitosamente.');
    }

    public function show($id)
    {
        $tarea = Tarea::findOrFail($id); // Encuentra la tarea por su ID
        $usuarios = User::all(); // Obtén todos los usuarios disponibles

        return view('tareas.show', compact('tarea', 'usuarios'));
    }

    public function destroy(Tarea $tarea)
    {
        $tarea->delete();
        return redirect()->route('tareas.index')->with('success', 'La tarea fue eliminada correctamente.');
    }

    public function asignarUsuario(Request $request, Tarea $tarea)
    {
        // Validar que el usuario seleccionado exista
        $request->validate([
            'asignado_a' => 'nullable|exists:users,id',
        ]);

        // Actualizar el campo 'asignado_a' en la tarea
        $tarea->update([
            'asignado_a' => $request->asignado_a,
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('tareas.show', $tarea)->with('success', 'Usuario asignado correctamente.');
    }

    public function cambiarEstado(Request $request, Tarea $tarea)
    {
        // Validar el estado enviado
        $request->validate([
            'estado' => 'required|string|in:pendiente,en_progreso,completada',
        ]);

        // Actualizar el estado de la tarea
        $tarea->update([
            'estado' => $request->estado,
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('tareas.show', $tarea)->with('success', 'Estado de la tarea actualizado correctamente.');
    }
}
