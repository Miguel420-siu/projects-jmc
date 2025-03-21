<?php

namespace App\Http\Controllers;

use App\Models\tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tarea.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
    $request->validate([
        'titulo' => 'required|string|max:255',
        'descripcion' => 'required|string|max:255',
        'fecha_limite' => 'required|date',
        'prioridad' => 'required|string',
        'estado' => 'required|string',
    ]);

    // Guardar los datos en la base de datos
    Tarea::create($request->all());

    // Redirigir al usuario con un mensaje de éxito
    return view('tarea.almacenada');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(tarea $tarea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tarea $tarea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tarea $tarea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tarea $tarea)
    {
        //
    }
}
