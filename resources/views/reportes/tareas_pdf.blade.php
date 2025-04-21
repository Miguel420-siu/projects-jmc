<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Tareas</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #999;
            padding: 6px;
            text-align: center;
        }
        th {
            background-color: #eee;
        }
        h2 {
            text-align: center;
        }
        .no-results {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #555;
        }
    </style>
</head>
<body>
    <h2>Reporte de Tareas</h2>

    @if($tareas->isEmpty())
        <p class="no-results">No se encontraron resultados para los criterios seleccionados.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Proyecto</th>
                    <th>Título</th>
                    <th>Fecha Límite</th>
                    <th>Prioridad</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tareas as $tarea)
                    <tr>
                        <td>{{ $tarea->nombre_proyecto }}</td>
                        <td>{{ $tarea->titulo }}</td>
                        <td>{{ \Carbon\Carbon::parse($tarea->fecha_limite)->format('d/m/Y') }}</td>
                        <td>{{ ucfirst($tarea->prioridad) }}</td>
                        <td>{{ ucfirst(str_replace('_', ' ', $tarea->estado)) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>