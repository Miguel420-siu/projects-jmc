{{-- filepath: c:\Users\pc\Downloads\projectsj\resources\views\tareas\index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <!-- Encabezado con título y botones -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">📋 Lista de Tareas</h2>
        <div>
            <a href="{{ route('tareas.create') }}" class="btn btn-primary me-2">➕ Crear Tarea</a>
            <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">Ir a Proyectos</a>
        </div>
    </div>

    <!-- Filtro para buscar tareas -->
    <form method="GET" action="{{ route('tareas.index') }}" class="mb-4">
        <div class="row g-2">
            <!-- Filtro por número de proyecto -->
            <div class="col-md-4">
                <input type="text" name="proyecto_id" class="form-control" placeholder="Número del Proyecto" value="{{ request('proyecto_id') }}">
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
    <div class="card p-4">
        @if($tareas->isEmpty())
            <div class="alert alert-info text-center">
                No hay tareas registradas.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center align-middle">
                    <thead class="table-dark">
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
                                <td>
                                    <span class="badge 
                                        @if($tarea->prioridad == 'alta') bg-danger 
                                        @elseif($tarea->prioridad == 'media') bg-warning 
                                        @else bg-success 
                                        @endif">
                                        {{ ucfirst($tarea->prioridad) }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge 
                                        @if($tarea->estado == 'pendiente') bg-warning 
                                        @elseif($tarea->estado == 'en_progreso') bg-info 
                                        @else bg-success 
                                        @endif">
                                        {{ ucfirst($tarea->estado) }}
                                    </span>
                                </td>
                                <td>{{ $tarea->proyecto_id }}</td>
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
@endsection