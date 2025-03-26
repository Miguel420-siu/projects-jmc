<?php
namespace App\Contracts;

use App\Models\Tarea;

interface TareaInterface
{
    public function obtenerTarea();
    public function crearTareas(array $data);
    public function actualizarTarea(Tarea $tarea, array $data);
    public function eliminarTarea(Tarea $tarea);
}
