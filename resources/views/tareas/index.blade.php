{{-- filepath: c:\Users\pc\Downloads\projectsj\resources\views\tareas\index.blade.php --}}
@extends('layouts.app')

@section('title', 'Lista de Tareas')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="mb-0">📋 Lista de Tareas</h3>
            <div>
                <a href="{{ route('tareas.create') }}" class="btn btn-primary">➕ Crear Tarea</a>
                <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">Ir a Proyectos</a>
            </div>
        </div>
        <div class="card-body">
            <!-- Filtros -->
            <form method="GET" action="{{ route('tareas.index') }}" class="mb-4">
                <div class="row g-2">
                    <!-- Filtro por nombre del proyecto -->
                    <div class="col-md-4">
                        <select name="nombre_proyecto" class="form-select">
                            <option value="">Todos los Proyectos</option>
                            @foreach ($proyecto as $proyecto)
                                <option value="{{ $proyecto->nombre }}" {{ request('nombre_proyecto') == $proyecto->nombre ? 'selected' : '' }}>
                                    {{ $proyecto->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Filtro por estado -->
                    <div class="col-md-3">
                        <select name="estado" class="form-select">
                            <option value="">Todos los Estados</option>
                            <option value="pendiente" {{ request('estado') == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                            <option value="en_progreso" {{ request('estado') == 'en_progreso' ? 'selected' : '' }}>En Progreso</option>
                            <option value="completada" {{ request('estado') == 'completada' ? 'selected' : '' }}>Completada</option>
                        </select>
                    </div>

                    <!-- Filtro por prioridad -->
                    <div class="col-md-3">
                        <select name="prioridad" class="form-select">
                            <option value="">Todas las Prioridades</option>
                            <option value="alta" {{ request('prioridad') == 'alta' ? 'selected' : '' }}>Alta</option>
                            <option value="media" {{ request('prioridad') == 'media' ? 'selected' : '' }}>Media</option>
                            <option value="baja" {{ request('prioridad') == 'baja' ? 'selected' : '' }}>Baja</option>
                        </select>
                    </div>

                    <!-- Botones de acción -->
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">Filtrar</button>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('tareas.index') }}" class="btn btn-secondary w-100">Limpiar Filtro</a>
                    </div>
                </div>
            </form>

            <!-- Tabla de tareas -->
            @if($tareas->isEmpty())
                <div class="alert alert-info text-center">
                    No hay tareas registradas.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>Nombre del Proyecto</th>
                                <th>Título</th>
                                <th>Fecha Límite</th>
                                <th>Prioridad</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tareas as $tarea)
                                <tr>
                                    <td>{{ $tarea->nombre_proyecto }}</td>
                                    <td>{{ $tarea->titulo }}</td>
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
                                        <a href="{{ route('tareas.show', $tarea) }}" class="btn btn-sm btn-outline-info">👁️ Ver</a>
                                        <a href="{{ route('tareas.edit', $tarea) }}" class="btn btn-sm btn-outline-warning">✏️ Editar</a>
                                        <form action="{{ route('tareas.destroy', $tarea) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Estás seguro de eliminar esta tarea?')">🗑️ Eliminar</button>
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
</div>
@endsection