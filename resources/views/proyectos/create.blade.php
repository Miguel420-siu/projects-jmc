@extends('layouts.app')

@section('title', 'Crear Proyecto')

@section('content')
@auth
<div class="container py-4">
    <!-- Tarjeta principal con animación -->
    <div class="card border-0 shadow-lg rounded-3 overflow-hidden card-hover animated-element" data-animation="fadeInUp" data-delay="100">
        <!-- Encabezado con gradiente animado -->
        <div class="card-header bg-gradient-primary text-white py-3 animated-element" data-animation="fadeInDown">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <i class="fas fa-plus-circle fa-lg me-3"></i>
                    <h3 class="h5 mb-0">Crear Nuevo Proyecto</h3>
                </div>
                <a href="{{ route('proyectos.index') }}" class="btn btn-outline-light btn-sm rounded-pill">
                    <i class="fas fa-arrow-left me-1"></i> Volver
                </a>
            </div>
        </div>
        
        <!-- Cuerpo del formulario con animación escalonada -->
        <div class="card-body p-4">
            <form action="{{ route('proyectos.store') }}" method="POST" id="create-project-form">
                @csrf

                <!-- Campo Nombre con animación -->
                <div class="mb-4 animated-element" data-animation="fadeInUp" data-delay="200">
                    <label for="nombre" class="form-label">Nombre del Proyecto</label>
                    <input type="text" class="form-control form-control-lg" id="nombre" name="nombre" 
                           placeholder="Ingrese el nombre del proyecto" required>
                </div>

                <!-- Campo Descripción con animación -->
                <div class="mb-4 animated-element" data-animation="fadeInUp" data-delay="250">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" 
                              rows="4" placeholder="Describa el propósito del proyecto"></textarea>
                </div>

                <div class="row">
                    <!-- Campo Fecha de Inicio con animación -->
                    <div class="col-md-6 mb-4 animated-element" data-animation="fadeInUp" data-delay="300">
                        <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                        <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
                    </div>

                    <!-- Campo Fecha de Fin con animación -->
                    <div class="col-md-6 mb-4 animated-element" data-animation="fadeInUp" data-delay="350">
                        <label for="fecha_fin" class="form-label">Fecha de Fin</label>
                        <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" required>
                    </div>
                </div>

                <!-- Campo Miembros con animación -->
                <div class="mb-4 animated-element" data-animation="fadeInUp" data-delay="400">
                    <label for="miembros" class="form-label">Miembros del Equipo</label>
                    <input type="text" class="form-control" id="miembros" name="miembros" 
                           placeholder="Ingrese emails de miembros separados por comas">
                    <small class="text-muted">Ejemplo: usuario1@email.com, usuario2@email.com</small>
                </div>

                <!-- Botón de enviar con animación -->
                <div class="d-grid gap-2 animated-element" data-animation="fadeInUp" data-delay="450">
                    <button type="submit" class="btn btn-primary btn-lg rounded-pill">
                        <i class="fas fa-save me-2"></i> Guardar Proyecto
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    /* Estilos para el formulario */
    .form-control {
        border-radius: 8px;
        padding: 12px 15px;
        transition: all 0.3s ease;
    }
    
    .form-control:focus {
        border-color: #4A90E2;
        box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.2);
    }
    
    textarea.form-control {
        min-height: 120px;
    }
    
    /* Animaciones personalizadas */
    @keyframes fadeInUp {
        from { 
            opacity: 0;
            transform: translateY(20px);
        }
        to { 
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes fadeInDown {
        from { 
            opacity: 0;
            transform: translateY(-20px);
        }
        to { 
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .animated-element {
        opacity: 0;
        animation-fill-mode: forwards;
    }
    
    /* Efecto hover para la tarjeta */
    .card-hover {
        transition: all 0.3s ease;
    }
    
    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
    
    /* Gradiente para el encabezado */
    .bg-gradient-primary {
        background: linear-gradient(135deg, #4A90E2 0%, #764ba2 100%);
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Animación de elementos
        function animateElements() {
            const elements = document.querySelectorAll('.animated-element');
            elements.forEach(element => {
                const animation = element.getAttribute('data-animation') || 'fadeIn';
                const delay = parseInt(element.getAttribute('data-delay')) || 0;
                
                setTimeout(() => {
                    element.style.animation = `${animation} 0.6s ease-out forwards`;
                }, delay);
            });
        }
        animateElements();
        
        // Validación de fechas
        const fechaInicio = document.getElementById("fecha_inicio");
        const fechaFin = document.getElementById("fecha_fin");
        const today = new Date().toISOString().split("T")[0];
        
        fechaInicio.min = today;
        
        fechaInicio.addEventListener("change", function() {
            fechaFin.min = fechaInicio.value;
            if (fechaFin.value && new Date(fechaFin.value) < new Date(fechaInicio.value)) {
                fechaFin.value = fechaInicio.value;
            }
        });
        
        document.getElementById("create-project-form").addEventListener("submit", function(e) {
            const fechaInicioVal = new Date(fechaInicio.value);
            const fechaFinVal = new Date(fechaFin.value);
            
            if (fechaFinVal < fechaInicioVal) {
                e.preventDefault();
                alert("La fecha de fin no puede ser anterior a la fecha de inicio.");
                return;
            }
            
            if (fechaFinVal < new Date(today)) {
                e.preventDefault();
                alert("La fecha de fin no puede ser anterior a la fecha actual.");
                return;
            }
        });
    });
</script>
@endauth
@endsection