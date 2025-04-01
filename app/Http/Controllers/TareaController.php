<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Models\Proyectos;
use App\Models\Proyecto;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    public function index(Request $request)
    {
        $query = Tarea::query();

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

        // Obtener las tareas filtradas
        $tareas = $query->get();

        // Obtener los proyectos para el filtro
        $proyecto = Proyectos::all();

        return view('tareas.index', compact('tareas', 'proyecto'));
    }

    public function create()
    {
        $proyectos = Proyectos::all(); // Obtén todos los proyectos
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

        Tarea::create($request->all());

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
        return redirect()->route('proyectos.index')->with('success', 'El proyecto se eliminó correctamente.');
    }
}
