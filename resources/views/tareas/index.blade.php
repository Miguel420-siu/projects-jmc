@extends('layouts.app')

@section('title', 'Lista de Tareas')

@section('content')
@auth
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="mb-0">📋 Lista de Tareas</h3>
            @role('Admin')
            <div>
                <a href="{{ route('tareas.create') }}" class="btn btn-primary">➕ Crear Tarea</a>
            </div>
            @endrole
        </div>
        <div class="card-body">
            <!-- Filtros -->
            <form method="GET" action="{{ route('tareas.index') }}" class="mb-4">
                <div class="row g-2">
                    <!-- Filtro por nombre del proyecto -->
                    <div class="col-md-3">
                        <select name="nombre_proyecto" class="form-select">
                            <option value="">Todos los Proyectos</option>
                            @foreach ($proyecto as $item)
                                <option value="{{ $item->nombre }}" {{ request('nombre_proyecto') == $item->nombre ? 'selected' : '' }}>
                                    {{ $item->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Filtro por estado -->
                    <div class="col-md-2">
                        <select name="estado" class="form-select">
                            <option value="">Todos los Estados</option>
                            <option value="pendiente" {{ request('estado') == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                            <option value="en_progreso" {{ request('estado') == 'en_progreso' ? 'selected' : '' }}>En Progreso</option>
                            <option value="completada" {{ request('estado') == 'completada' ? 'selected' : '' }}>Completada</option>
                        </select>
                    </div>

                    <!-- Filtro por prioridad -->
                    <div class="col-md-2">
                        <select name="prioridad" class="form-select">
                            <option value="">Todas las Prioridades</option>
                            <option value="alta" {{ request('prioridad') == 'alta' ? 'selected' : '' }}>Alta</option>
                            <option value="media" {{ request('prioridad') == 'media' ? 'selected' : '' }}>Media</option>
                            <option value="baja" {{ request('prioridad') == 'baja' ? 'selected' : '' }}>Baja</option>
                        </select>
                    </div>

                    <!-- Filtro por Fecha de Fin -->
                    <div class="col-md-2">
                        <label for="fecha_fin_filter" class="form-label">Fecha de Fin</label>
                        <input type="date" name="fecha_fin_filter" id="fecha_fin_filter" class="form-control" value="{{ request('fecha_fin_filter') }}">
                    </div>

                    <!-- Botones de acción en una sola línea -->
                    <div class="col-md-3 d-flex justify-content-start align-items-center">
                        <button type="submit" class="btn btn-primary w-50 me-2">Filtrar</button>
                        <a href="{{ route('tareas.index') }}" class="btn btn-secondary w-50">Limpiar Filtro</a>
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
                                        @role('Admin')
                                        <a href="{{ route('tareas.edit', $tarea) }}" class="btn btn-sm btn-outline-warning">✏️ Editar</a>
                                        <form action="{{ route('tareas.destroy', $tarea) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Estás seguro de eliminar esta tarea?')">🗑️ Eliminar</button>
                                        </form>
                                        @endrole
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
@endauth

@guest
    <script>alert('Debes iniciar sesión para ver tus tareas.');</script>
@endguest
@endsection
