<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Models\Proyectos;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    public function index(Request $request)
    {
        $query = Tarea::query();

        if ($request->has('nombre_proyecto') && $request->nombre_proyecto != '') {
            $query->where('nombre_proyecto', $request->nombre_proyecto);
        }

        $tareas = $query->get();

        return view('tareas.index', compact('tareas'));
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
}
