@extends('layouts.app')

@section('title', 'Lista de Proyectos')

@section('content')

<!-- Agregamos el enlace a Animate.css directamente en el archivo -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

<div class="container mt-5">
    <div class="card shadow-lg" id="card-proyectos">
        <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
            <h3 class="mb-0">📋 Lista de Proyectos</h3>
            @role('Admin')
            <div>
                <a href="{{ route('proyectos.create') }}" class="btn btn-light">➕ Crear Proyecto</a>
            </div>
            @endrole
        </div>
        <div class="card-body" id="card-body-proyectos">
            <!-- Filtros -->
            <form method="GET" action="{{ route('proyectos.index') }}" class="mb-4" id="filtros-form">
                <div class="row g-2">
                    <!-- Filtro por nombre -->
                    <div class="col-md-3">
                        <select name="nombre" class="form-select filtro" aria-label="Seleccione un Proyecto">
                            <option value="">Selecciona un Proyecto</option>
                            @foreach ($proyectosDisponibles as $proyecto)
                                <option value="{{ $proyecto->nombre }}" {{ request('nombre') == $proyecto->nombre ? 'selected' : '' }}>
                                    {{ $proyecto->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Filtro por estado -->
                    <div class="col-md-2">
                        <select name="estado" class="form-select filtro" aria-label="Selecciona un Estado">
                            <option value="">Todos los Estados</option>
                            <option value="pendiente" {{ request('estado') == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                            <option value="en_progreso" {{ request('estado') == 'en_progreso' ? 'selected' : '' }}>En Progreso</option>
                            <option value="completada" {{ request('estado') == 'completada' ? 'selected' : '' }}>Completada</option>
                        </select>
                    </div>

                    <!-- Filtro por Fecha de Inicio -->
                    <div class="col-md-2">
                        <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                        <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control filtro" value="{{ request('fecha_inicio') }}">
                    </div>

                    <!-- Filtro por Fecha de Fin -->
                    <div class="col-md-2">
                        <label for="fecha_fin" class="form-label">Fecha de Fin</label>
                        <input type="date" name="fecha_fin" id="fecha_fin" class="form-control filtro" value="{{ request('fecha_fin') }}">
                    </div>

                    <!-- Botones de acción en una sola línea -->
                    <div class="col-md-3 d-flex justify-content-start align-items-center">
                        <button type="submit" class="btn btn-primary w-50 me-2">Filtrar</button>
                        <a href="{{ route('proyectos.index') }}" class="btn btn-secondary w-50">Limpiar Filtro</a>
                    </div>
                </div>
            </form>

            <!-- Mostrar proyectos -->
            @if($proyectos->isEmpty())
                <div class="alert alert-info text-center">
                    No hay proyectos registrados.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-striped table-hover text-center align-middle" id="tabla-proyectos">
                        <thead class="table-light">
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
                                <tr class="tabla-fila">
                                    <td>{{ $proyecto->nombre }}</td>
                                    <td>{{ $proyecto->descripcion }}</td>
                                    <td>{{ \Carbon\Carbon::parse($proyecto->fecha_inicio)->format('d/m/Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($proyecto->fecha_fin)->format('d/m/Y') }}</td>
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
                                        <a href="{{ route('proyectos.show', $proyecto) }}" class="btn btn-sm btn-outline-primary" title="Ver Proyecto">👁️</a>
                                        @role('Admin')
                                        <a href="{{ route('proyectos.edit', $proyecto) }}" class="btn btn-sm btn-outline-warning" title="Editar Proyecto">✏️</a>
                                        <form action="{{ route('proyectos.destroy', $proyecto) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este proyecto?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Eliminar Proyecto">🗑️</button>
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

<script>
    // Animación para los filtros
    window.addEventListener('load', function() {
        const filtrosForm = document.getElementById('filtros-form');
        filtrosForm.classList.add('animate__animated', 'animate__fadeInUp');
    });

    // Animación de fila de tabla al pasar el mouse
    const filas = document.querySelectorAll('.tabla-fila');
    filas.forEach(fila => {
        fila.addEventListener('mouseenter', function() {
            fila.classList.add('animate__animated', 'animate__pulse');
        });
        fila.addEventListener('mouseleave', function() {
            fila.classList.remove('animate__pulse');
        });
    });

    // Animación de carga en la tabla
    const tabla = document.getElementById('tabla-proyectos');
    tabla.classList.add('animate__animated', 'animate__fadeIn');
</script>

@endsection
