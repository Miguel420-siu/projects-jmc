{{-- filepath: c:\Users\AdminSena\Documents\projects-jmc\resources\views\proyectos\index.blade.php --}}
@extends('layouts.app')

@section('title', 'Lista de Proyectos')

@section('content')
<div class="card">
    <div class="card-header">Proyectos</div>
    <div class="card-body">
        <a href="{{ route('proyectos.create') }}" class="btn btn-primary mb-3">Crear Proyecto</a>
        <a href="{{ route('tareas.index') }}" class="btn btn-secondary mb-3">Ir a Tareas</a> <!-- Botón para redirigir al índice de tareas -->
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha de Fin</th>
                    <th>Miembros</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proyectos as $proyecto)
                <tr>
                    <td>{{ $proyecto->nombre }}</td>
                    <td>{{ $proyecto->descripcion }}</td>
                    <td>{{ $proyecto->fecha_inicio }}</td>
                    <td>{{ $proyecto->fecha_fin }}</td>
                    <td>{{ $proyecto->miembros }}</td>
                    <td>{{ ucfirst($proyecto->estado) }}</td>
                    <td>
                        <a href="{{ route('proyectos.show', $proyecto) }}" class="btn btn-sm btn-outline-info">👁️ Ver</a>
                        <a href="{{ route('proyectos.edit', $proyecto) }}" class="btn btn-sm btn-outline-warning">✏️ Editar</a>
                        <form action="{{ route('proyectos.destroy', $proyecto) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Estás seguro de eliminar este proyecto?')">
                                🗑️ Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection