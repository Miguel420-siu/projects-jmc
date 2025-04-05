@extends('layouts.app')

@section('title', 'Crear Tarea')

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
                            <i class="fas fa-plus-circle me-2"></i>Crear Nueva Tarea
                        </h3>
                    </div>
                </div>
                
                <!-- Card Body -->
                <div class="card-body p-4">
                    <form id="create-task-form" action="{{ route('tareas.store') }}" method="POST" novalidate>
                        @csrf

                        <!-- Proyecto -->
                        <div class="mb-4">
                            <label for="nombre_proyecto" class="form-label fw-bold">Proyecto</label>
                            <select class="form-select @error('nombre_proyecto') is-invalid @enderror" 
                                    id="nombre_proyecto" name="nombre_proyecto" required>
                                <option value="" disabled selected>Seleccione un proyecto</option>
                                @foreach ($proyectos as $proyecto)
                                    <option value="{{ $proyecto->nombre }}" 
                                        {{ old('nombre_proyecto') == $proyecto->nombre ? 'selected' : '' }}>
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

                        <!-- Título -->
                        <div class="mb-4">
                            <label for="titulo" class="form-label fw-bold">Título de la Tarea</label>
                            <input type="text" class="form-control @error('titulo') is-invalid @enderror" 
                                   id="titulo" name="titulo" 
                                   value="{{ old('titulo') }}"
                                   placeholder="Ej: Implementar módulo de usuarios" required>
                            @error('titulo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Descripción -->
                        <div class="mb-4">
                            <label for="descripcion" class="form-label fw-bold">Descripción</label>
                            <textarea class="form-control @error('descripcion') is-invalid @enderror" 
                                      id="descripcion" name="descripcion" rows="4"
                                      placeholder="Describa los detalles de la tarea...">{{ old('descripcion') }}</textarea>
                            <small class="text-muted">Opcional pero recomendado</small>
                            @error('descripcion')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Fechas y Prioridad -->
                        <div class="row g-3 mb-4">
                            <!-- Fecha Límite -->
                            <div class="col-md-6">
                                <label for="fecha_limite" class="form-label fw-bold">Fecha Límite</label>
                                <input type="date" class="form-control @error('fecha_limite') is-invalid @enderror" 
                                       id="fecha_limite" name="fecha_limite" 
                                       value="{{ old('fecha_limite') }}" required>
                                @error('fecha_limite')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <!-- Prioridad -->
                            <div class="col-md-6">
                                <label for="prioridad" class="form-label fw-bold">Prioridad</label>
                                <select class="form-select @error('prioridad') is-invalid @enderror" 
                                        id="prioridad" name="prioridad" required>
                                    <option value="alta" {{ old('prioridad') == 'alta' ? 'selected' : '' }}>
                                        <i class="fas fa-exclamation-triangle me-2"></i> Alta
                                    </option>
                                    <option value="media" {{ old('prioridad') == 'media' ? 'selected' : '' }}>
                                        <i class="fas fa-exclamation-circle me-2"></i> Media
                                    </option>
                                    <option value="baja" {{ old('prioridad') == 'baja' ? 'selected' : '' }}>
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

                        <!-- Botones -->
                        <div class="d-flex justify-content-between mt-4">
                            <button type="reset" class="btn btn-outline-secondary px-4">
                                <i class="fas fa-undo me-2"></i> Limpiar
                            </button>
                            <button type="submit" class="btn btn-primary px-4 submit-btn">
                                <i class="fas fa-save me-2"></i> Guardar Tarea
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
<!-- Incluir animate.css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Configurar fecha mínima (hoy)
    const fechaInput = document.getElementById("fecha_limite");
    const today = new Date().toISOString().split("T")[0];
    fechaInput.min = today;
    
    // Si hay un valor antiguo, mantenerlo
    if (!fechaInput.value && !"{{ old('fecha_limite') }}") {
        // Opcional: Establecer fecha por defecto (ej. 3 días después)
        const defaultDate = new Date();
        defaultDate.setDate(defaultDate.getDate() + 3);
        fechaInput.value = defaultDate.toISOString().split("T")[0];
    }

    // Validación del formulario
    const form = document.getElementById('create-task-form');
    form.addEventListener('submit', function(e) {
        const submitBtn = document.querySelector('.submit-btn');
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Guardando...';
        
        if (!form.checkValidity()) {
            e.preventDefault();
            e.stopPropagation();
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<i class="fas fa-save me-2"></i> Guardar Tarea';
            
            // Mostrar errores con animación
            const invalidFields = form.querySelectorAll(':invalid');
            invalidFields.forEach(field => {
                field.classList.add('animate__animated', 'animate__headShake');
                setTimeout(() => {
                    field.classList.remove('animate__animated', 'animate__headShake');
                }, 1000);
            });
        }
        
        form.classList.add('was-validated');
    });

    // Mejorar visualización de prioridades
    const prioridadSelect = document.getElementById('prioridad');
    prioridadSelect.addEventListener('change', function() {
        // Puedes añadir lógica adicional si necesitas
        console.log('Prioridad seleccionada:', this.value);
    });
});
</script>

<style>
    .card {
        transition: all 0.3s ease;
        border: none;
    }
    
    .card-header {
        border-bottom: none;
    }
    
    .form-control, .form-select {
        border-radius: 0.375rem;
        padding: 0.75rem 1rem;
        transition: border-color 0.3s, box-shadow 0.3s;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }
    
    .submit-btn {
        transition: all 0.3s ease;
    }
    
    .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    
    /* Estilos para las opciones de prioridad */
    .form-select option[value="alta"] {
        color: #dc3545;
        font-weight: bold;
    }
    
    .form-select option[value="media"] {
        color: #fd7e14;
        font-weight: bold;
    }
    
    .form-select option[value="baja"] {
        color: #28a745;
        font-weight: bold;
    }
</style>
@endsection