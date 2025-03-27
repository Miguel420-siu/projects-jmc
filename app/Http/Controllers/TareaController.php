<?php

namespace App\Http\Controllers;
use App\Services\TareaService;
use App\Models\Tarea;
use App\Models\Proyectos;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    

protected $tareaService;

public function __construct(TareaService $tareaService)
{
    $this->tareaService = $tareaService;
}
    
public function index(Request $request)
{
    $query = Tarea::query();

    // Filtrar por número de proyecto si se proporciona
    if ($request->has('proyecto_id') && $request->proyecto_id != '') {
        $query->where('proyecto_id', $request->proyecto_id);
    }

    $tareas = $query->get();

    return view('tareas.index', compact('tareas'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('tareas.create'); // No requiere argumentos
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'proyecto_id' => 'nullable|exists:proyectos,id', // Validar si el proyecto existe
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha_limite' => 'required|date',
            'prioridad' => 'required|string',
        ]);
    
        // Crear la tarea en la base de datos
        Tarea::create($request->all());
    
        // Redirigir al índice de tareas con un mensaje de éxito
        return redirect()->route('tareas.index')->with('success', 'Tarea creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $tarea = Tarea::with('proyecto')->findOrFail($id); // Cargar la relación proyecto
    return view('tareas.show', compact('tarea'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarea $tarea)
    {
        
        return view('tareas.edit',compact('tarea'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarea $tarea)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha_limite' => 'required|date',
            'prioridad' => 'required|string',
            'estado' => 'required|in:pendiente,en_progreso,completada',
        ]);

        $this->tareaService->actualizarTarea($tarea, $request->all());

        return redirect()->route('tareas.edit', $tarea)->with('success', 'La tarea se editó con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarea $tarea)
    {
        $this->tareaService->eliminarTarea($tarea);
        return redirect()->route('tareas.index')->with('success','la tarea se borro corretcamente');
    }
}
