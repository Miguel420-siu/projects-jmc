@extends('layouts.app')

@section('title', 'Detalles de la Tarea')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-lg">
                <!-- Card Header with Gradient Background -->
                <div class="card-header bg-gradient-primary text-white py-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="{{ route('tareas.index') }}" class="btn btn-outline-light btn-sm">
                            <i class="fas fa-arrow-left me-1"></i> Volver
                        </a>
                        <h3 class="mb-0 text-center flex-grow-1">
                            <i class="fas fa-tasks me-2"></i> Detalles de la Tarea
                        </h3>
                        @role('Admin')
                        <div>
                            <a href="{{ route('tareas.edit', $tarea) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit me-1"></i> Editar
                            </a>
                            <form action="{{ route('tareas.destroy', $tarea) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta tarea?')">
                                    <i class="fas fa-trash me-1"></i> Eliminar
                                </button>
                            </form>
                        </div>
                        @endrole
                    </div>
                </div>
                
                <!-- Card Body -->
                <div class="card-body p-4">
                    <!-- Task Details Section -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="info-card p-3 mb-3 border rounded bg-light">
                                <h5 class="fw-bold text-primary mb-3">
                                    <i class="fas fa-info-circle me-2"></i>Información Básica
                                </h5>
                                <div class="mb-3">
                                    <span class="fw-bold">Proyecto:</span>
                                    <span class="ms-2">{{ $tarea->nombre_proyecto }}</span>
                                </div>
                                <div class="mb-3">
                                    <span class="fw-bold">Título:</span>
                                    <span class="ms-2">{{ $tarea->titulo }}</span>
                                </div>
                                <div>
                                    <span class="fw-bold">Prioridad:</span>
                                    <span class="ms-2 badge 
                                        @if($tarea->prioridad == 'alta') bg-danger
                                        @elseif($tarea->prioridad == 'media') bg-warning
                                        @else bg-success
                                        @endif">
                                        {{ ucfirst($tarea->prioridad) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-card p-3 mb-3 border rounded bg-light">
                                <h5 class="fw-bold text-primary mb-3">
                                    <i class="fas fa-calendar-alt me-2"></i>Fechas y Estado
                                </h5>
                                <div class="mb-3">
                                    <span class="fw-bold">Fecha Límite:</span>
                                    <span class="ms-2">{{ \Carbon\Carbon::parse($tarea->fecha_limite)->format('d/m/Y') }}</span>
                                </div>
                                <div>
                                    <span class="fw-bold">Estado:</span>
                                    <span class="ms-2 badge 
                                        @if($tarea->estado == 'pendiente') bg-warning
                                        @elseif($tarea->estado == 'en_progreso') bg-info
                                        @else bg-success
                                        @endif">
                                        {{ ucfirst(str_replace('_', ' ', $tarea->estado)) }}
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
                            {{ $tarea->descripcion ?: 'No hay descripción disponible' }}
                        </div>
                    </div>

                    <!-- Assignment Section -->
                    <div class="mb-4">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="fw-bold text-primary mb-3">
                                    <i class="fas fa-user-tie me-2"></i>Asignación
                                </h5>
                                <div class="p-3 border rounded bg-light">
                                    @if($tarea->asignadoA)
                                        <div class="d-flex align-items-center">
                                            <div class="avatar bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                                {{ substr($tarea->asignadoA->name, 0, 1) }}
                                            </div>
                                            <div>
                                                <h6 class="mb-0">{{ $tarea->asignadoA->name }}</h6>
                                                <small class="text-muted">{{ $tarea->asignadoA->email }}</small>
                                            </div>
                                        </div>
                                    @else
                                        <span class="text-muted">No asignado</span>
                                    @endif
                                </div>
                            </div>
                            
                            <!-- Status Update Section -->
                            <div class="col-md-6">
                                @unlessrole('Admin')
                                <h5 class="fw-bold text-primary mb-3">
                                    <i class="fas fa-sync-alt me-2"></i>Actualizar Estado
                                </h5>
                                <div class="p-3 border rounded bg-light">
                                    <form action="{{ route('tareas.cambiarEstado', $tarea) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="input-group">
                                            <select name="estado" class="form-select" required>
                                                <option value="pendiente" {{ $tarea->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                                <option value="en_progreso" {{ $tarea->estado == 'en_progreso' ? 'selected' : '' }}>En Progreso</option>
                                                <option value="completada" {{ $tarea->estado == 'completada' ? 'selected' : '' }}>Completada</option>
                                            </select>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-save me-1"></i> Guardar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                @endunlessrole
                            </div>
                        </div>
                    </div>

                    <!-- Admin Actions Section -->
                    @role('Admin')
                    <div class="mt-4">
                        <div class="card border-primary">
                            <div class="card-header bg-primary text-white">
                                <i class="fas fa-user-plus me-2"></i>Asignar Usuario
                            </div>
                            <div class="card-body">
                                <form action="{{ route('tareas.asignarUsuario', $tarea) }}" method="POST">
                                    @csrf
                                    <div class="input-group">
                                        <select name="asignado_a" class="form-select" required>
                                            <option value="" {{ is_null($tarea->asignado_a) ? 'selected' : '' }}>No asignado</option>
                                            @foreach ($usuarios as $user)
                                                <option value="{{ $user->id }}" {{ $tarea->asignado_a == $user->id ? 'selected' : '' }}>
                                                    {{ $user->name }} ({{ $user->email }})
                                                </option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-check me-1"></i> Asignar
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endrole
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
        height: 100%;
    }
    .info-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .avatar {
        font-weight: bold;
        font-size: 1.1rem;
    }
    .badge {
        font-size: 0.85rem;
        padding: 0.35em 0.65em;
    }
    .form-select, .form-control {
        border-radius: 0.375rem;
    }
</style>
@endsection