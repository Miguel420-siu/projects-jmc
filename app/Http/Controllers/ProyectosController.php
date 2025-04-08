<?php

namespace App\Http\Controllers;

use App\Models\Proyectos;
use App\Models\Tarea;
use Illuminate\Http\Request;
use App\Models\User;

class ProyectosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Iniciar la consulta para obtener proyectos del usuario autenticado
        $query = auth()->user()->proyectos();

        // Filtro por nombre del proyecto (mostrar solo los proyectos que están creados)
        if ($request->filled('nombre')) {
            $query->where('nombre', $request->nombre);
        }

        // Filtro por estado del proyecto
        if ($request->filled('estado')) {
            $query->where('estado', $request->estado);
        }

        // Filtro por fecha de inicio
        if ($request->filled('fecha_inicio')) {
            $query->whereDate('fecha_inicio', '=', $request->fecha_inicio);
        }

        // Filtro por fecha de fin
        if ($request->filled('fecha_fin')) {
            $query->whereDate('fecha_fin', '=', $request->fecha_fin);
        }

        // Obtener los proyectos filtrados
        $proyectos = $query->get();

        // Obtener los proyectos para el filtro de nombre
        $proyectosDisponibles = auth()->user()->proyectos()->get();

        // Retornar la vista con los proyectos filtrados
        return view('proyectos.index', compact('proyectos', 'proyectosDisponibles'));
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
            'miembros' => 'required|string',
        ]);

        // Crear proyecto asociado al usuario autenticado
        auth()->user()->proyectos()->create($request->all());

        return redirect()->route('proyectos.index')->with('success', 'Proyecto creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Encuentra el proyecto por su ID
        $proyecto = Proyectos::findOrFail($id);

        $usuarios = User::all(); // Obtén todos los usuarios disponibles.

        // Obtén las tareas asociadas utilizando nombre_proyecto
        $tareas = Tarea::where('nombre_proyecto', $proyecto->nombre)->get();

        /*$usuarios = User::whereDoesntHave('proyectos', function ($query) use ($id) {
            $query->where('proyecto_id', $id);
        })->get(); // Obtén todos los usuarios disponibles.*/

        // Retorna la vista con el proyecto y las tareas asociadas
        return view('proyectos.show', compact('proyecto', 'tareas', 'usuarios'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proyectos $proyecto)
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
    public function destroy(Proyectos $proyecto)
    {
        $proyecto->delete();

        // Eliminar las tareas asociadas al proyecto
        Tarea::where('nombre_proyecto', $proyecto->nombre)->delete();

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

    public function asignarUsuario(Request $request, Proyectos $proyecto)
    {
        if (!auth()->user()->hasRole('Admin')) {
            abort(403, 'No tienes permiso para realizar esta acción.');
        }

        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $proyecto->usuarios()->attach($request->user_id);

        return redirect()->route('proyectos.show', $proyecto)->with('success', 'Usuario asignado correctamente.');
    }

    public function eliminarUsuario(Request $request, Proyectos $proyecto)
    {
        if (!auth()->user()->hasRole('Admin')) {
            abort(403, 'No tienes permiso para realizar esta acción.');
        }

        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $proyecto->usuarios()->detach($request->user_id);

        return redirect()->route('proyectos.show', $proyecto)->with('success', 'Usuario eliminado correctamente.');
    }

    public function cambiarEstado(Request $request, Proyectos $proyecto)
    {
        $request->validate([
            'estado' => 'required|string|in:pendiente,en_progreso,completado',
        ]);

        $proyecto->update([
            'estado' => $request->estado,
        ]);

        return redirect()->route('proyectos.show', $proyecto)->with('success', 'Estado del proyecto actualizado.');
    }
}
