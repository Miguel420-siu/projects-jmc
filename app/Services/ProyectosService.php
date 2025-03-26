<?php

namespace App\Services;

use App\Contracts\ProyectosInterface;
use App\Models\proyectos;

class ProyectosService implements ProyectosInterface {
    public function obtenerProyectos()
    {
        return proyectos::all();
    }

    public function crearProyectos(array $data)
    {
        return proyectos::create($data);
    }

    public function actualizarProyectos(proyectos $proyectos, array $data)
    {
        $proyectos->update($data);
        return $proyectos;
    }

    public function eliminarProyectos(proyectos $proyectos)
    {
        return $proyectos->delete();
    }
}