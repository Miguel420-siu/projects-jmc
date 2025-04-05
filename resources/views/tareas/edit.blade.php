@extends('layouts.app')

@section('title', 'Editar Tarea')

@section('content')
<div class="container py-4 animate__animated animate__fadeIn">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-lg">
                <!-- Card Header -->
                <div class="card-header bg-gradient-primary text-white py-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="{{ route('tareas.index') }}" class="btn btn-outline-light btn-sm">
                            <i class="fas fa-arrow-left me-1"></i> Volver
                        </a>
                        <h3 class="mb-0 text-center flex-grow-1">
                            <i class="fas fa-edit me-2"></i>Editar Tarea
                        </h3>
                    </div>
                </div>
                
                <!-- Card Body -->
                <div class="card-body p-4">
                    <form id="edit-task-form" action="{{ route('tareas.update', $tarea) }}" method="POST" novalidate>
                        @csrf
                        @method('PUT')

                        <!-- Proyecto y Prioridad -->
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="nombre_proyecto" class="form-label fw-bold">Proyecto</label>
                                <select class="form-select @error('nombre_proyecto') is-invalid @enderror" 
                                        id="nombre_proyecto" name="nombre_proyecto" required>
                                    @foreach ($proyectos as $proyecto)
                                        <option value="{{ $proyecto->nombre }}" 
                                            {{ old('nombre_proyecto', $tarea->nombre_proyecto) == $proyecto->nombre ? 'selected' : '' }}>
                                            {{ $proyecto->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('nombre_proyecto')
                                    <div class="invalid-feedback animate__animated animate__shakeX">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6">
                                <label for="prioridad" class="form-label fw-bold">Prioridad</label>
                                <select name="prioridad" class="form-select @error('prioridad') is-invalid @enderror" required>
                                    <option value="alta" {{ old('prioridad', $tarea->prioridad) == 'alta' ? 'selected' : '' }}>
                                        <i class="fas fa-exclamation-triangle me-2"></i> Alta
                                    </option>
                                    <option value="media" {{ old('prioridad', $tarea->prioridad) == 'media' ? 'selected' : '' }}>
                                        <i class="fas fa-exclamation-circle me-2"></i> Media
                                    </option>
                                    <option value="baja" {{ old('prioridad', $tarea->prioridad) == 'baja' ? 'selected' : '' }}>
                                        <i class="fas fa-info-circle me-2"></i> Baja
                                    </option>
                                </select>
                                @error('prioridad')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Título y Fecha -->
                        <div class="row g-3 mb-4">
                            <div class="col-md-8">
                                <label for="titulo" class="form-label fw-bold">Título</label>
                                <input type="text" name="titulo" 
                                       class="form-control @error('titulo') is-invalid @enderror" 
                                       value="{{ old('titulo', $tarea->titulo) }}" 
                                       placeholder="Ingrese el título de la tarea" required>
                                @error('titulo')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="col-md-4">
                                <label for="fecha_limite" class="form-label fw-bold">Fecha Límite</label>
                                <input type="date" name="fecha_limite" id="fecha_limite" 
                                       class="form-control @error('fecha_limite') is-invalid @enderror" 
                                       value="{{ old('fecha_limite', $tarea->fecha_limite) }}" required>
                                @error('fecha_limite')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Descripción -->
                        <div class="mb-4">
                            <label for="descripcion" class="form-label fw-bold">Descripción</label>
                            <textarea name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" 
                                      rows="4" placeholder="Agregue detalles importantes...">{{ old('descripcion', $tarea->descripcion) }}</textarea>
                            @error('descripcion')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Estado -->
                        <div class="mb-4">
                            <label for="estado" class="form-label fw-bold">Estado</label>
                            <select name="estado" class="form-select @error('estado') is-invalid @enderror">
                                <option value="pendiente" {{ old('estado', $tarea->estado) == 'pendiente' ? 'selected' : '' }}>
                                    <i class="fas fa-clock me-2"></i> Pendiente
                                </option>
                                <option value="en_progreso" {{ old('estado', $tarea->estado) == 'en_progreso' ? 'selected' : '' }}>
                                    <i class="fas fa-spinner me-2"></i> En progreso
                                </option>
                                <option value="completada" {{ old('estado', $tarea->estado) == 'completada' ? 'selected' : '' }}>
                                    <i class="fas fa-check-circle me-2"></i> Completada
                                </option>
                            </select>
                            @error('estado')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Botones -->
                        <div class="d-flex justify-content-between mt-4">
                            <button type="reset" class="btn btn-outline-secondary px-4">
                                <i class="fas fa-undo me-2"></i> Restablecer
                            </button>
                            <button type="submit" class="btn btn-primary px-4 submit-btn">
                                <i class="fas fa-save me-2"></i> Actualizar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Configurar fecha mínima
    const fechaInput = document.getElementById("fecha_limite");
    const today = new Date().toISOString().split("T")[0];
    
    // Solo establecer mínimo si la fecha actual es mayor a la existente
    if (!fechaInput.value || fechaInput.value < today) {
        fechaInput.min = today;
    }

    // Validación del formulario
    const form = document.getElementById('edit-task-form');
    form.addEventListener('submit', function(e) {
        const submitBtn = document.querySelector('.submit-btn');
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Actualizando...';
        
        if (!form.checkValidity()) {
            e.preventDefault();
            e.stopPropagation();
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<i class="fas fa-save me-2"></i> Actualizar';
            
            const invalidFields = form.querySelectorAll(':invalid');
            invalidFields.forEach(field => {
                field.classList.add('animate__animated', 'animate__headShake');
                setTimeout(() => field.classList.remove('animate__animated', 'animate__headShake'), 1000);
            });
        }
        
        form.classList.add('was-validated');
    });
});
</script>

<style>
    .card {
        border: none;
        transition: all 0.3s ease;
    }
    
    .form-control, .form-select {
        border-radius: 0.375rem;
        padding: 0.75rem 1rem;
        transition: all 0.3s ease;
    }
    
    .form-select option[value="alta"] {
        color: #dc3545;
        font-weight: 500;
    }
    
    .form-select option[value="media"] {
        color: #ffc107;
        font-weight: 500;
    }
    
    .form-select option[value="baja"] {
        color: #28a745;
        font-weight: 500;
    }
    
    .submit-btn {
        transition: all 0.3s ease;
    }
    
    .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
</style>
@endsection