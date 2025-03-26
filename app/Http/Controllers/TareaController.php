<?php

namespace App\Http\Controllers;
use App\Services\TareaService;
use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    

protected $tareaService;

public function __construct(TareaService $tareaService)
{
    $this->tareaService = $tareaService;
}
    
    public function index()
    {
        $tareas=$this->tareaService->obtenerTarea();
        return view('tareas.index',compact('tareas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tareas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validar datos
    $request->validate([
        
        'titulo' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
        'fecha_limite' => 'required|date',
        'prioridad' => 'required|string',
        'estado' => 'required|in:pendiente,en_progreso,completada',
    ]);

    
    Tarea::create([
        'titulo' => $request->titulo,
        'descripcion' => $request->descripcion,
        'fecha_limite' => $request->fecha_limite,
        'prioridad' => $request->prioridad,
        'estado' => $request->estado,
    ]);

    
    return redirect()->route('tareas.index')->with('success', 'Tarea creada correctamente.');
}

    /**
     * Display the specified resource.
     */
    public function show(Tarea $tarea)
    {
        return view('tareas.show',compact('tarea'));
        //
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
