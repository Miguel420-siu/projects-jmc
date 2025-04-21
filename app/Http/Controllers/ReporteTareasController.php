<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea; // Asegúrate de que el modelo Tarea esté importado
use Barryvdh\DomPDF\Facade\Pdf; // Usa DomPDF para generar el PDF

class ReporteTareasController extends Controller
{
    public function generarReporte(Request $request)
    {
        // Obtener los filtros del request
        $nombre_proyecto = $request->input('nombre_proyecto');
        $estado = $request->input('estado');
        $prioridad = $request->input('prioridad');
        $fecha_fin_filter = $request->input('fecha_fin_filter');

        // Construir la consulta con los filtros
        $query = Tarea::query();

        if ($nombre_proyecto) {
            $query->where('nombre_proyecto', $nombre_proyecto);
        }

        if ($estado) {
            $query->where('estado', $estado);
        }

        if ($prioridad) {
            $query->where('prioridad', $prioridad);
        }

        if ($fecha_fin_filter) {
            $query->whereDate('fecha_limite', '<=', $fecha_fin_filter);
        }

        // Obtener las tareas filtradas
        $tareas = $query->get();

        // Generar el PDF usando la vista 'reportes.tareas_pdf'
        $pdf = Pdf::loadView('reportes.tareas_pdf', compact('tareas'));

        // Descargar el PDF
        return $pdf->download('reporte_tareas.pdf');
    }
}
