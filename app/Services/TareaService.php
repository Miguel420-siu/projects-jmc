<?php
namespace App\Services;


use App\Contracts\TareaInterface;
use App\Models\Tarea;

class TareaService implements TareaInterface {
    public function obtenerTarea()
    {
        return Tarea::all();
    }

    public function crearTareas(array $data)
    {
        return Tarea::create($data);
    }

    public function actualizarTarea(Tarea $tarea, array $data)
    {
        $tarea->update($data);
        return $tarea;
    }

    public function eliminarTarea(Tarea $tarea)
    {
        return $tarea->delete();
    }
}
