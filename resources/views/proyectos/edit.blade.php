@extends('layouts.app')

@section('title', 'Editar Proyecto')

@section('content')
<div class="container py-5 animate__animated animate__fadeIn">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-primary text-white py-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="{{ route('proyectos.index') }}" class="btn btn-outline-light btn-sm">
                            <i class="fas fa-arrow-left me-1"></i> Volver
                        </a>
                        <h4 class="mb-0 text-center flex-grow-1">
                            <i class="fas fa-edit me-2"></i>Editar Proyecto
                        </h4>
                    </div>
                </div>
                
                <div class="card-body p-4">
                    <form id="edit-project-form" action="{{ route('proyectos.update', $proyecto) }}" method="POST" novalidate>
                        @csrf
                        @method('PUT')

                        <!-- Campo Nombre -->
                        <div class="mb-4">
                            <label for="nombre" class="form-label fw-bold">Nombre del Proyecto</label>
                            <input type="text" class="form-control form-control-lg @error('nombre') is-invalid @enderror" 
                                   id="nombre" name="nombre" value="{{ old('nombre', $proyecto->nombre) }}" 
                                   placeholder="Ej: Desarrollo de nueva plataforma" required>
                            @error('nombre')
                                <div class="invalid-feedback animate__animated animate__shakeX">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Campo Descripción -->
                        <div class="mb-4">
                            <label for="descripcion" class="form-label fw-bold">Descripción</label>
                            <textarea class="form-control @error('descripcion') is-invalid @enderror" 
                                      id="descripcion" name="descripcion" rows="4" 
                                      placeholder="Detalla los objetivos del proyecto..." required>{{ old('descripcion', $proyecto->descripcion) }}</textarea>
                            @error('descripcion')
                                <div class="invalid-feedback animate__animated animate__shakeX">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Fechas -->
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="fecha_inicio" class="form-label fw-bold">Fecha de Inicio</label>
                                <input type="date" class="form-control @error('fecha_inicio') is-invalid @enderror" 
                                       id="fecha_inicio" name="fecha_inicio" 
                                       value="{{ old('fecha_inicio', $proyecto->fecha_inicio) }}" required>
                                @error('fecha_inicio')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="fecha_fin" class="form-label fw-bold">Fecha de Finalización</label>
                                <input type="date" class="form-control @error('fecha_fin') is-invalid @enderror" 
                                       id="fecha_fin" name="fecha_fin" 
                                       value="{{ old('fecha_fin', $proyecto->fecha_fin) }}" required>
                                @error('fecha_fin')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Estado y Miembros -->
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="estado" class="form-label fw-bold">Estado</label>
                                <select class="form-select @error('estado') is-invalid @enderror" id="estado" name="estado" required>
                                    <option value="" disabled>Seleccione un estado</option>
                                    <option value="pendiente" {{ old('estado', $proyecto->estado) == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                    <option value="en_progreso" {{ old('estado', $proyecto->estado) == 'en_progreso' ? 'selected' : '' }}>En Progreso</option>
                                    <option value="completada" {{ old('estado', $proyecto->estado) == 'completada' ? 'selected' : '' }}>Completada</option>
                                </select>
                                @error('estado')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="miembros" class="form-label fw-bold">Miembros del Equipo</label>
                                <input type="text" class="form-control @error('miembros') is-invalid @enderror" 
                                       id="miembros" name="miembros" 
                                       value="{{ old('miembros', $proyecto->miembros) }}" 
                                       placeholder="Ej: Juan Pérez, María García, Carlos López" required>
                                <small class="text-muted">Separe los nombres con comas</small>
                                @error('miembros')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Botones -->
                        <div class="d-flex justify-content-between mt-4">
                            <button type="reset" class="btn btn-outline-secondary px-4">
                                <i class="fas fa-undo me-2"></i>Restablecer
                            </button>
                            <button type="submit" class="btn btn-primary px-4 submit-btn">
                                <i class="fas fa-save me-2"></i>Guardar Cambios
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
    // Validación de fechas
    const fechaInicio = document.getElementById("fecha_inicio");
    const fechaFin = document.getElementById("fecha_fin");
    const today = new Date().toISOString().split("T")[0];

    // Establecer mínimos para las fechas
    fechaInicio.min = today;
    
    if (fechaInicio.value) {
        fechaFin.min = fechaInicio.value;
    } else {
        fechaFin.min = today;
    }

    fechaInicio.addEventListener("change", function() {
        fechaFin.min = this.value;
        if (fechaFin.value && fechaFin.value < this.value) {
            fechaFin.value = this.value;
            showToast('La fecha final no puede ser anterior a la de inicio', 'warning');
        }
    });

    // Validación del formulario
    const form = document.getElementById('edit-project-form');
    form.addEventListener('submit', function(e) {
        const submitBtn = document.querySelector('.submit-btn');
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Guardando...';
        
        // Validación adicional si es necesaria
        if (!form.checkValidity()) {
            e.preventDefault();
            e.stopPropagation();
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<i class="fas fa-save me-2"></i>Guardar Cambios';
            
            // Mostrar errores con animación
            const invalidFields = form.querySelectorAll(':invalid');
            invalidFields.forEach(field => {
                field.classList.add('animate__animated', 'animate__headShake');
                setTimeout(() => {
                    field.classList.remove('animate__animated', 'animate__headShake');
                }, 1000);
            });
        }
    });

    // Función para mostrar notificaciones
    function showToast(message, type = 'success') {
        // Implementar tu sistema de notificaciones preferido
        console.log(`${type}: ${message}`);
    }
});
</script>

<style>
    .card {
        transition: all 0.3s ease;
        border: none;
    }
    
    .card:hover {
        box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.15) !important;
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
    }
</style>
@endsection