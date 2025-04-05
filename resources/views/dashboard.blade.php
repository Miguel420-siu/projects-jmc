@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container mt-4">
        <!-- Encabezado -->
        <div class="text-center mb-5 animated-element" data-animation="fadeInDown">
            <h1 class="display-4 text-primary">Bienvenido a tu Espacio</h1>
            <p class="lead text-muted" data-animation="fadeIn" data-delay="300">
                Gestiona tus proyectos y tareas con facilidad
            </p>
        </div>

        <!-- Tarjetas -->
        <div class="row">
            <!-- Tarjeta de Proyectos -->
            <div class="col-md-4 mb-4 animated-element" data-animation="fadeInUp" data-delay="500">
                <div class="card border-0 shadow-lg card-hover">
                    <div class="card-body text-center p-4">
                        <div class="mb-4">
                            <i class="fas fa-project-diagram fa-3x text-primary"></i>
                        </div>
                        <h3 class="h5 card-title">Mis Proyectos</h3>
                        <p class="text-muted mb-3">Organiza tus trabajos</p>
                        <a href="{{ route('proyectos.index') }}" class="btn btn-outline-primary btn-pill">
                            <i class="fas fa-arrow-right mr-2"></i> Ver Proyectos
                        </a>
                    </div>
                </div>
            </div>

            <!-- Tarjeta de Perfil -->
            <div class="col-md-4 mb-4 animated-element" data-animation="fadeInUp" data-delay="600">
                <div class="card border-0 shadow-lg card-hover">
                    <div class="card-body text-center p-4">
                        <div class="mb-4">
                            <i class="fas fa-user fa-3x text-success"></i>
                        </div>
                        <h3 class="h5 card-title">Mi Perfil</h3>
                        <p class="text-muted">{{ Auth::user()->name }}</p>
                        <div class="user-info mt-2">
                            <i class="far fa-calendar-alt mr-2 text-muted"></i>
                            <span class="small">Desde: {{ Auth::user()->created_at->format('M Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tarjeta de Tareas -->
            <div class="col-md-4 mb-4 animated-element" data-animation="fadeInUp" data-delay="700">
                <div class="card border-0 shadow-lg card-hover">
                    <div class="card-body text-center p-4">
                        <div class="mb-4">
                            <i class="fas fa-tasks fa-3x text-info"></i>
                        </div>
                        <h3 class="h5 card-title">Mis Tareas</h3>
                        <p class="text-muted mb-3">Administra tus actividades</p>
                        <a href="{{ route('tareas.index') }}" class="btn btn-outline-info btn-pill">
                            <i class="fas fa-arrow-right mr-2"></i> Ver Tareas
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mensaje inspirador -->
        <div class="row mt-5">
            <div class="col-12 animated-element" data-animation="fadeIn" data-delay="900">
                <div class="card bg-gradient-primary text-white border-0 shadow">
                    <div class="card-body text-center p-4">
                        <h3 class="h4 mb-3">¡Comienza a trabajar!</h3>
                        <p class="mb-0">Organiza tus proyectos y tareas para mayor productividad</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    /* Font Awesome */
    @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');
    
    .user-info {
        background-color: rgba(0, 0, 0, 0.03);
        padding: 6px 12px;
        border-radius: 20px;
        display: inline-block;
        font-size: 0.9rem;
    }

    .btn-pill {
        border-radius: 50px;
        padding: 8px 20px;
        transition: all 0.3s ease;
        border-width: 1px;
    }

    .btn-pill:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .bg-gradient-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    /* Colores para iconos */
    .text-primary { color: #4e73df !important; }
    .text-success { color: #1cc88a !important; }
    .text-info { color: #36b9cc !important; }

    /* Efecto hover para tarjetas */
    .card-hover {
        transition: all 0.3s ease;
    }

    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    /* Clases de animación */
    .animated-element {
        opacity: 0;
        animation-fill-mode: forwards;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
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
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Función para animar elementos
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

        // Iniciar animaciones cuando la página carga
        animateElements();

        // Opcional: Reiniciar animaciones cuando el usuario vuelve a la página
        window.addEventListener('pageshow', function(event) {
            if (event.persisted) {
                const elements = document.querySelectorAll('.animated-element');
                elements.forEach(el => {
                    el.style.animation = 'none';
                    void el.offsetHeight; // Trigger reflow
                    el.style.animation = null;
                });
                setTimeout(animateElements, 50);
            }
        });
    });
</script>