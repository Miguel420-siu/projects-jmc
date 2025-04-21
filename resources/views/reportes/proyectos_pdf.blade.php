<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Proyectos</title>
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
    <h2>Reporte de Proyectos</h2>

    @if($proyectos->isEmpty())
        <p class="no-results">No se encontraron resultados para los criterios seleccionados.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Inicio</th>
                    <th>Fin</th>
                    <th>Miembros</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($proyectos as $proyecto)
                    <tr>
                        <td>{{ $proyecto->nombre }}</td>
                        <td>{{ $proyecto->descripcion }}</td>
                        <td>{{ \Carbon\Carbon::parse($proyecto->fecha_inicio)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($proyecto->fecha_fin)->format('d/m/Y') }}</td>
                        <td>{{ $proyecto->miembros }}</td>
                        <td>{{ ucfirst(str_replace('_', ' ', $proyecto->estado)) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
