{{-- filepath: c:\Users\AdminSena\Documents\projects-jmc\resources\views\proyectos\index.blade.php --}}
@extends('layouts.app')

@section('title', 'Lista de Proyectos')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="mb-0">📋 Lista de Proyectos</h3>
        <div>
            <a href="{{ route('proyectos.create') }}" class="btn btn-primary">➕ Crear Proyecto</a>
            <a href="{{ route('tareas.index') }}" class="btn btn-secondary">Ir a Tareas</a>
        </div>
    </div>
    <div class="card-body">
        @if($proyectos->isEmpty())
            <div class="alert alert-info text-center">
                No hay proyectos registrados.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
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
                                <td>{{ $proyecto->id }}</td>
                                <td>{{ $proyecto->nombre }}</td>
                                <td>{{ $proyecto->descripcion }}</td>
                                <td>{{ $proyecto->fecha_inicio }}</td>
                                <td>{{ $proyecto->fecha_fin }}</td>
                                <td>{{ $proyecto->miembros }}</td>
                                <td>
                                    <span class="badge 
                                        @if($proyecto->estado == 'pendiente') bg-warning 
                                        @elseif($proyecto->estado == 'en_progreso') bg-info 
                                        @else bg-success 
                                        @endif">
                                        {{ ucfirst($proyecto->estado) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('proyectos.show', $proyecto) }}" class="btn btn-sm btn-outline-info">👁️ Ver</a>
                                    <a href="{{ route('proyectos.edit', $proyecto) }}" class="btn btn-sm btn-outline-warning">✏️ Editar</a>
                                    <form action="{{ route('proyectos.destroy', $proyecto) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Estás seguro de eliminar este proyecto?')">🗑️ Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection