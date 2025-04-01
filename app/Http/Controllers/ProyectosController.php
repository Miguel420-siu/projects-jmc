<?php

namespace App\Http\Controllers;

use App\Models\Proyectos;

use App\Models\Tarea; // Ensure the Tarea model exists in this namespace
// Ensure the Proyectos model exists in this namespace

// If the model is in a different namespace, update the import statement accordingly, e.g.:
// use App\OtherNamespace\Proyectos;
use Illuminate\Http\Request;

class ProyectosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proyectos = Proyectos::all();
        return view('proyectos.index', compact('proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proyectos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'nullable|date|after_or_equal:fecha_inicio',
            'estado' => 'required|in:activo,completado,pendiente',
            'miembros' => 'required|string',
        ]);

        // Crear proyecto
        Proyectos::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'estado' => $request->estado,
            'miembros' => $request->miembros,
        ]);

        return redirect()->route('proyectos.index')->with('success', 'Proyecto creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Encuentra el proyecto por su ID
        $proyecto = Proyectos::findOrFail($id);

        // Obtén las tareas asociadas utilizando nombre_proyecto
        $tareas = Tarea::where('nombre_proyecto', $proyecto->nombre)->get();

        // Retorna la vista con el proyecto y las tareas asociadas
        return view('proyectos.show', compact('proyecto', 'tareas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(proyectos $proyecto)
    {
        return view('proyectos.edit', compact('proyecto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'estado' => 'required|in:pendiente,en_progreso,completada',
            'miembros' => 'nullable|string',
        ]);

        $proyecto = Proyectos::findOrFail($id);
        $proyecto->update($request->all());

        return redirect()->route('proyectos.index')->with('success', 'Proyecto actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(proyectos $proyecto)
    {
        $proyecto->delete();
        return redirect()->route('proyectos.index')->with('success', 'El proyecto se eliminó correctamente.');
    }

    public function mostrarTareas($proyectoId)
    {
        $proyecto = Proyectos::with('tareas')->find($proyectoId);

        if (!$proyecto) {
            return response()->json(['error' => 'Proyecto no encontrado'], 404);
        }

        $tareas = $proyecto->tareas;

        return view('proyectos.tareas', compact('proyecto', 'tareas'));
    }
}
