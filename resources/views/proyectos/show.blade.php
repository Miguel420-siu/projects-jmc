@extends('layouts.app')

@section('title', 'Detalles del Proyecto')

@section('content')
<<<<<<< HEAD
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
                            {{ ucfirst($proyecto->estado) }}
                            @role('Admin') <!-- Mostrar el formulario solo si el usuario tiene el rol de Admin -->
                            <form action="{{ route('proyectos.cambiarEstado', $proyecto) }}" method="POST" class="mt-2">
                                @csrf
                                @method('PATCH')
                                <div class="d-flex">
                                    <select name="estado" class="form-select me-2" required>
                                        <option value="pendiente" {{ $proyecto->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                        <option value="en_progreso" {{ $proyecto->estado == 'en_progreso' ? 'selected' : '' }}>En Progreso</option>
                                        <option value="completado" {{ $proyecto->estado == 'completado' ? 'selected' : '' }}>Completado</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                </div>
                            </form>
                            @endrole
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
=======
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0 rounded-lg">
                <!-- Card Header with Gradient Background -->
                <div class="card-header bg-gradient-primary text-white py-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="{{ route('proyectos.index') }}" class="btn btn-outline-light btn-sm">
                            <i class="fas fa-arrow-left me-1"></i> Volver
                        </a>
                        <h3 class="mb-0 text-center flex-grow-1">
                            <i class="fas fa-project-diagram me-2"></i> Detalles del Proyecto
                        </h3>
                        @role('Admin')
                        <div>
                            <a href="{{ route('proyectos.edit', $proyecto) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit me-1"></i> Editar
                            </a>
                            <form action="{{ route('proyectos.destroy', $proyecto) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este proyecto?')">
                                    <i class="fas fa-trash me-1"></i> Eliminar
                                </button>
                            </form>
                        </div>
                        @endrole
                    </div>
                </div>
                
                <!-- Card Body -->
                <div class="card-body p-4">
                    <!-- Project Details Section -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="info-card p-3 mb-3 border rounded bg-light">
                                <h5 class="fw-bold text-primary mb-3">
                                    <i class="fas fa-info-circle me-2"></i>Información Básica
                                </h5>
                                <div class="mb-2">
                                    <span class="fw-bold">Nombre:</span>
                                    <span class="ms-2">{{ $proyecto->nombre }}</span>
                                </div>
                                <div class="mb-2">
                                    <span class="fw-bold">Estado:</span>
                                    <span class="ms-2 badge 
                                        @if($proyecto->estado == 'pendiente') bg-warning 
                                        @elseif($proyecto->estado == 'en_progreso') bg-info 
>>>>>>> 4fe8831147335601d7166ba21dec8b63b62559ce
                                        @else bg-success 
                                        @endif">
                                        {{ ucfirst(str_replace('_', ' ', $proyecto->estado)) }}
                                    </span>
                                </div>
                                <div class="mb-2">
                                    <span class="fw-bold">Miembros:</span>
                                    <span class="ms-2">{{ $proyecto->miembros }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-card p-3 mb-3 border rounded bg-light">
                                <h5 class="fw-bold text-primary mb-3">
                                    <i class="fas fa-calendar-alt me-2"></i>Fechas
                                </h5>
                                <div class="mb-2">
                                    <span class="fw-bold">Inicio:</span>
                                    <span class="ms-2">{{ \Carbon\Carbon::parse($proyecto->fecha_inicio)->format('d/m/Y') }}</span>
                                </div>
                                <div class="mb-2">
                                    <span class="fw-bold">Fin:</span>
                                    <span class="ms-2">{{ \Carbon\Carbon::parse($proyecto->fecha_fin)->format('d/m/Y') }}</span>
                                </div>
                                <div>
                                    <span class="fw-bold">Duración:</span>
                                    <span class="ms-2">
                                        {{ \Carbon\Carbon::parse($proyecto->fecha_inicio)->diffInDays($proyecto->fecha_fin) }} días
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Description Section -->
                    <div class="mb-4">
                        <h5 class="fw-bold text-primary mb-3">
                            <i class="fas fa-align-left me-2"></i>Descripción
                        </h5>
                        <div class="p-3 border rounded bg-light">
                            {{ $proyecto->descripcion ?: 'No hay descripción disponible' }}
                        </div>
                    </div>

                    <!-- Tareas Asociadas Section -->
                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="fw-bold text-primary mb-0">
                                <i class="fas fa-tasks me-2"></i>Tareas Asociadas
                            </h5>
                            <span class="badge bg-primary">
                                {{ $tareas->where('nombre_proyecto', $proyecto->nombre)->count() }} tareas
                            </span>
                        </div>
                        
                        @php
                            $tareasAsociadas = $tareas->where('nombre_proyecto', $proyecto->nombre);
                        @endphp
                        
                        @if($tareasAsociadas->isEmpty())
                            <div class="alert alert-info">
                                No hay tareas asociadas a este proyecto.
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Título</th>
                                            <th>Prioridad</th>
                                            <th>Estado</th>
                                            <th>Fecha Límite</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tareasAsociadas as $tarea)
                                            <tr>
                                                <td>{{ $tarea->titulo }}</td>
                                                <td>
                                                    @if($tarea->prioridad == 'alta')
                                                        <span class="badge bg-danger">Alta</span>
                                                    @elseif($tarea->prioridad == 'media')
                                                        <span class="badge bg-warning">Media</span>
                                                    @else
                                                        <span class="badge bg-success">Baja</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <span class="badge 
                                                        @if($tarea->estado == 'pendiente') bg-warning 
                                                        @elseif($tarea->estado == 'en_progreso') bg-info 
                                                        @else bg-success 
                                                        @endif">
                                                        {{ ucfirst(str_replace('_', ' ', $tarea->estado)) }}
                                                    </span>
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($tarea->fecha_limite)->format('d/m/Y') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>

<<<<<<< HEAD
            <div class="mt-4 d-flex justify-content-between">
                <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">⬅️ Volver a Proyectos</a>
                @role('Admin')
                <div>
                    <a href="{{ route('proyectos.edit', $proyecto) }}" class="btn btn-warning">✏️ Editar Proyecto</a>
                    <form action="{{ route('proyectos.destroy', $proyecto) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este proyecto?')">🗑️ Eliminar Proyecto</button>
                    </form>
=======
                    <!-- Usuarios Asignados Section -->
                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="fw-bold text-primary mb-0">
                                <i class="fas fa-users me-2"></i>Equipo
                            </h5>
                            <span class="badge bg-primary">
                                {{ $proyecto->usuarios->count() }} miembros
                            </span>
                        </div>
                        
                        @if($proyecto->usuarios->isEmpty())
                            <div class="alert alert-info">
                                No hay usuarios asignados a este proyecto.
                            </div>
                        @else
                            <div class="row">
                                @foreach ($proyecto->usuarios as $user)
                                    <div class="col-md-4 mb-3">
                                        <div class="card border-0 shadow-sm h-100">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                                        {{ substr($user->name, 0, 1) }}
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0">{{ $user->name }}</h6>
                                                        <small class="text-muted">{{ $user->email }}</small>
                                                    </div>
                                                </div>
                                                @role('Admin')
                                                <div class="mt-2 text-end">
                                                    <form action="{{ route('proyectos.eliminarUsuario', $proyecto) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                                            <i class="fas fa-user-minus"></i> Remover
                                                        </button>
                                                    </form>
                                                </div>
                                                @endrole
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <!-- Admin Actions Section -->
                    @role('Admin')
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="card border-primary">
                                <div class="card-header bg-primary text-white">
                                    <i class="fas fa-user-plus me-2"></i>Asignar Usuario
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('proyectos.asignarUsuario', $proyecto) }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <select name="user_id" class="form-select">
                                                @foreach ($usuarios as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100">
                                            <i class="fas fa-plus-circle me-2"></i>Agregar al Proyecto
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card border-success">
                                <div class="card-header bg-success text-white">
                                    <i class="fas fa-sync-alt me-2"></i>Cambiar Estado
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('proyectos.cambiarEstado', $proyecto) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="mb-3">
                                            <select name="estado" class="form-select">
                                                <option value="pendiente" {{ $proyecto->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                                <option value="en_progreso" {{ $proyecto->estado == 'en_progreso' ? 'selected' : '' }}>En Progreso</option>
                                                <option value="completado" {{ $proyecto->estado == 'completado' ? 'selected' : '' }}>Completado</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-success w-100">
                                            <i class="fas fa-save me-2"></i>Actualizar Estado
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endrole
>>>>>>> 4fe8831147335601d7166ba21dec8b63b62559ce
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-gradient-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
    }
    .info-card {
        transition: all 0.3s ease;
    }
    .info-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .avatar {
        font-weight: bold;
        font-size: 1.1rem;
    }
    .table-hover tbody tr:hover {
        background-color: rgba(102, 126, 234, 0.1);
    }
</style>
@endsection