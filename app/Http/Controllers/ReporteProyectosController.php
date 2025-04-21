<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\proyectos; // Asegúrate de que el modelo Proyecto esté importado
use Barryvdh\DomPDF\Facade\Pdf; // Usa DomPDF para generar el PDF

class ReporteProyectosController extends Controller
{
    public function generarReporte(Request $request)
    {
        // Obtener los filtros del request
        $nombre = $request->input('nombre');
        $estado = $request->input('estado');
        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_fin = $request->input('fecha_fin');

        // Construir la consulta con los filtros
        $query = proyectos::query();

        if ($nombre) {
            $query->where('nombre', $nombre);
        }

        if ($estado) {
            $query->where('estado', $estado);
        }

        if ($fecha_inicio) {
            $query->whereDate('fecha_inicio', '>=', $fecha_inicio);
        }

        if ($fecha_fin) {
            $query->whereDate('fecha_fin', '<=', $fecha_fin);
        }

        // Obtener los proyectos filtrados
        $proyectos = $query->get();

        // Generar el PDF usando la vista 'reportes.proyectos_pdf'
        $pdf = Pdf::loadView('reportes.proyectos_pdf', compact('proyectos'));

        // Descargar el PDF
        return $pdf->download('reporte_proyectos.pdf');
    }
}
