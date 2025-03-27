{{-- filepath: c:\Users\pc\Downloads\projectsj\resources\views\tareas\index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between mb-3">
        <h2 class="mb-4">📋 Lista de Tareas</h2>
        <a href="{{ route('proyectos.index') }}" class="btn btn-primary">Ir a Proyectos</a>
    </div>

    <!-- Filtro para buscar tareas por número de proyecto -->
    <form method="GET" action="{{ route('tareas.index') }}" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="proyecto_id" class="form-control" placeholder="Número del Proyecto" value="{{ request('proyecto_id') }}">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
            <div class="col-md-2">
                <a href="{{ route('tareas.index') }}" class="btn btn-secondary">Limpiar Filtro</a>
            </div>
        </div>
    </form>

    <div class="d-flex justify-content-end mb-3">
        @isset($proyecto)
            <a href="{{ route('tareas.create', $proyecto->id) }}" class="btn btn-primary">➕ Crear Tarea</a>
        @else
            <a href="{{ route('tareas.create') }}" class="btn btn-primary">➕ Crear Tarea</a>
        @endisset
    </div>

    <div class="card p-4">
        @if($tareas->isEmpty())
            <div class="alert alert-info text-center">
                No hay tareas registradas.
            </div>
        @else
            <table class="table table-hover text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Fecha Límite</th>
                        <th>Prioridad</th>
                        <th>Estado</th>
                        <th>Número del Proyecto</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tareas as $tarea)
                        <tr>
                            <td>{{ $tarea->id }}</td>
                            <td>{{ $tarea->titulo }}</td>
                            <td>{{ $tarea->descripcion }}</td>
                            <td>{{ $tarea->fecha_limite }}</td>
                            <td>{{ ucfirst($tarea->prioridad) }}</td>
                            <td>
                                <span class="badge 
                                    @if($tarea->estado == 'pendiente') bg-warning 
                                    @elseif($tarea->estado == 'en_progreso') bg-info 
                                    @else bg-success 
                                    @endif">
                                    {{ ucfirst($tarea->estado) }}
                                </span>
                            </td>
                            <td>
                                <form action="{{ route('tareas.update', $tarea) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="proyecto_id" value="{{ $tarea->proyecto_id }}" class="form-control" placeholder="Número del Proyecto">
                                    <button type="submit" class="btn btn-sm btn-outline-success mt-2">Asignar</button>
                                </form>
                            </td>
                            <td>
                                <a href="{{ route('tareas.show', $tarea) }}" class="btn btn-sm btn-outline-info">👁️ Ver</a>
                                <a href="{{ route('tareas.edit', $tarea) }}" class="btn btn-sm btn-outline-warning">✏️ Editar</a>
                                <form action="{{ route('tareas.destroy', $tarea) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Estás seguro de eliminar esta tarea?')">
                                        🗑️ Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection