{{-- filepath: c:\Users\AdminSena\Documents\projects-jmc\resources\views\proyectos\show.blade.php --}}
@extends('layouts.app')

@section('title', 'Detalles del Proyecto')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header text-center">
            <h3>📋 Detalles del Proyecto</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Nombre</th>
                        <td>{{ $proyecto->nombre }}</td>
                    </tr>
                    <tr>
                        <th>Descripción</th>
                        <td>{{ $proyecto->descripcion }}</td>
                    </tr>
                    <tr>
                        <th>Fecha de Inicio</th>
                        <td>{{ $proyecto->fecha_inicio }}</td>
                    </tr>
                    <tr>
                        <th>Fecha de Fin</th>
                        <td>{{ $proyecto->fecha_fin }}</td>
                    </tr>
                    <tr>
                        <th>Estado</th>
                        <td>
                            <span class="badge 
                                @if($proyecto->estado == 'pendiente') bg-warning 
                                @elseif($proyecto->estado == 'en_progreso') bg-info 
                                @else bg-success 
                                @endif">
                                {{ ucfirst($proyecto->estado) }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>Miembros</th>
                        <td>{{ $proyecto->miembros }}</td>
                    </tr>
                </tbody>
            </table>

            <h5 class="mt-4">Tareas Asociadas:</h5>
            @php
                $tareasAsociadas = $tareas->where('nombre_proyecto', $proyecto->nombre);
            @endphp
            @if($tareasAsociadas->isEmpty())
                <p>No hay tareas asociadas a este proyecto.</p>
            @else
                <table class="table table-bordered table-hover text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Título</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tareasAsociadas as $tarea)
                            <tr>
                                <td>{{ $tarea->titulo }}</td>
                                <td>
                                    <span class="badge 
                                        @if($tarea->estado == 'pendiente') bg-warning 
                                        @elseif($tarea->estado == 'en_progreso') bg-info 
                                        @else bg-success 
                                        @endif">
                                        {{ ucfirst($tarea->estado) }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

            <div class="mt-4 d-flex justify-content-between">
                <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">⬅️ Volver a Proyectos</a>
                <div>
                    <a href="{{ route('proyectos.edit', $proyecto) }}" class="btn btn-warning">✏️ Editar Proyecto</a>
                    <form action="{{ route('proyectos.destroy', $proyecto) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este proyecto?')">🗑️ Eliminar Proyecto</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection