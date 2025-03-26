<?php
namespace App\Contracts;

use App\Models\proyectos;

interface ProyectosInterface
{
    public function obtenerProyectos();
    public function crearProyectos(array $data);
    public function actualizarProyectos(proyectos $proyectos, array $data);
    public function eliminarProyectos(proyectos $proyectos);
}   

