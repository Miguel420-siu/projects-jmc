<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Models\Proyectos;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    public function index(Request $request)
    {
        // Obtener solo las tareas del usuario autenticado
        $query = Tarea::where('user_id', auth()->id());

        // Filtrar por nombre del proyecto
        if ($request->filled('nombre_proyecto')) {
            $query->where('nombre_proyecto', $request->nombre_proyecto);
        }

        // Filtrar por estado
        if ($request->filled('estado')) {
            $query->where('estado', $request->estado);
        }

        // Filtrar por prioridad
        if ($request->filled('prioridad')) {
            $query->where('prioridad', $request->prioridad);
        }

        // Filtrar por fecha de fin (fecha_limite)
        if ($request->filled('fecha_fin_filter')) {
            $query->whereDate('fecha_limite', '=', $request->fecha_fin_filter);  // Filtra solo por fecha exacta
        }

        // Obtener las tareas filtradas
        $tareas = $query->get();

        // Obtener los proyectos del usuario autenticado para los filtros
        $proyecto = Proyectos::where('user_id', auth()->id())->get();

        // Retornar la vista con las tareas y los proyectos
        return view('tareas.index', compact('tareas', 'proyecto'));
    }

    public function create()
    {
        // Obtener solo los proyectos del usuario autenticado
        $proyectos = Proyectos::where('user_id', auth()->id())->get();
        
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

    public function edit(Tarea $tarea)
    {
        $proyectos = Proyectos::all(); // Para mostrar en el formulario de edición
        return view('tareas.edit', compact('tarea', 'proyectos'));
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
        ]);

        $tarea->update($request->all());

        return redirect()->route('tareas.index')->with('success', 'Tarea actualizada exitosamente.');
    }

    public function show(Tarea $tarea)
    {
        // Retorna la vista de detalles de la tarea
        return view('tareas.show', compact('tarea'));
    }

    public function destroy(Tarea $tarea)
    {
        $tarea->delete();
        return redirect()->route('tareas.index')->with('success', 'La tarea fue eliminada correctamente.');
    }
}
