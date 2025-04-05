@extends('layouts.app')

@section('title', 'Gestión de Tareas')

@section('content')
@auth
<div class="container py-4 animated-element" data-animation="fadeIn">
    <!-- Tarjeta principal con animación -->
    <div class="card border-0 shadow-lg rounded-3 overflow-hidden card-hover" data-animation="fadeInUp" data-delay="100">
        <!-- Encabezado con gradiente animado -->
        <div class="card-header bg-gradient-primary text-white py-3 animated-element" data-animation="fadeInDown">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <i class="fas fa-clipboard-list fa-lg me-3"></i>
                    <h2 class="h5 mb-0 fw-light">Gestión de Tareas</h2>
                    <a href="{{ route('proyectos.index') }}" class="btn btn-outline-light btn-sm rounded-pill ms-3 btn-pill">
                        <i class="fas fa-project-diagram me-1"></i> Ir a Proyectos
                    </a>
                </div>
                @role('Admin')
                <div>
                    <a href="{{ route('tareas.create') }}" class="btn btn-light btn-sm rounded-pill shadow-sm px-3 btn-pill">
                        <i class="fas fa-plus-circle me-1"></i> Nueva Tarea
                    </a>
                </div>
                @endrole
            </div>
        </div>
        
        <!-- Cuerpo de la tarjeta con animación escalonada -->
        <div class="card-body p-4">
            <!-- Filtros mejorados con animación -->
            <form method="GET" action="{{ route('tareas.index') }}" class="mb-4 animated-element" data-animation="fadeIn" data-delay="200">
                <div class="row g-3 align-items-end">
                    <!-- Filtro por proyecto -->
                    <div class="col-md-3">
                        <label class="form-label small text-muted mb-1">Proyecto</label>
                        <select name="nombre_proyecto" class="form-select">
                            <option value="">Todos los proyectos</option>
                            @foreach ($proyecto as $item)
                                <option value="{{ $item->nombre }}" {{ request('nombre_proyecto') == $item->nombre ? 'selected' : '' }}>
                                    {{ $item->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Filtro por estado -->
                    <div class="col-md-2">
                        <label class="form-label small text-muted mb-1">Estado</label>
                        <select name="estado" class="form-select">
                            <option value="">Todos</option>
                            <option value="pendiente" {{ request('estado') == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                            <option value="en_progreso" {{ request('estado') == 'en_progreso' ? 'selected' : '' }}>En Progreso</option>
                            <option value="completada" {{ request('estado') == 'completada' ? 'selected' : '' }}>Completada</option>
                        </select>
                    </div>

                    <!-- Filtro por prioridad -->
                    <div class="col-md-2">
                        <label class="form-label small text-muted mb-1">Prioridad</label>
                        <select name="prioridad" class="form-select">
                            <option value="">Todas</option>
                            <option value="alta" {{ request('prioridad') == 'alta' ? 'selected' : '' }}>Alta</option>
                            <option value="media" {{ request('prioridad') == 'media' ? 'selected' : '' }}>Media</option>
                            <option value="baja" {{ request('prioridad') == 'baja' ? 'selected' : '' }}>Baja</option>
                        </select>
                    </div>

                    <!-- Filtro por fecha -->
                    <div class="col-md-2">
                        <label class="form-label small text-muted mb-1">Fecha Límite</label>
                        <input type="date" name="fecha_fin_filter" class="form-control" value="{{ request('fecha_fin_filter') }}">
                    </div>

                    <!-- Botones de acción -->
                    <div class="col-md-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary rounded-pill me-2 px-3 flex-grow-1 btn-pill">
                            <i class="fas fa-filter me-1"></i> Filtrar
                        </button>
                        <a href="{{ route('tareas.index') }}" class="btn btn-outline-secondary rounded-pill px-3 flex-grow-1 btn-pill">
                            <i class="fas fa-sync-alt me-1"></i> Limpiar
                        </a>
                    </div>
                </div>
            </form>

            <!-- Tabla de tareas con animación de filas -->
            @if($tareas->isEmpty())
                <div class="alert bg-light-primary border border-primary text-primary rounded-3 text-center animated-element" data-animation="fadeIn" data-delay="300">
                    <i class="fas fa-inbox me-2"></i> No se encontraron tareas
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-borderless table-hover align-middle">
                        <thead>
                            <tr class="border-bottom animated-element" data-animation="fadeIn" data-delay="200">
                                <th class="text-start text-muted fw-normal small text-uppercase">Proyecto</th>
                                <th class="text-start text-muted fw-normal small text-uppercase">Título</th>
                                <th class="text-center text-muted fw-normal small text-uppercase">Fecha</th>
                                <th class="text-center text-muted fw-normal small text-uppercase">Prioridad</th>
                                <th class="text-center text-muted fw-normal small text-uppercase">Estado</th>
                                <th class="text-center text-muted fw-normal small text-uppercase">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tareas as $index => $tarea)
                                <tr class="border-bottom animated-element" data-animation="fadeInLeft" data-delay="{{ 300 + ($index * 50) }}">
                                    <td class="text-start">{{ $tarea->nombre_proyecto }}</td>
                                    <td class="text-start fw-medium">{{ $tarea->titulo }}</td>
                                    <td class="text-center">
                                        <span class="badge bg-light text-dark border rounded-pill px-3 py-1">
                                            {{ $tarea->fecha_limite }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge rounded-pill px-3 py-1 
                                            @if($tarea->prioridad == 'alta') bg-danger-light text-danger
                                            @elseif($tarea->prioridad == 'media') bg-warning-light text-warning-dark
                                            @else bg-secondary-light text-secondary 
                                            @endif">
                                            {{ ucfirst($tarea->prioridad) }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge rounded-pill px-3 py-1 
                                            @if($tarea->estado == 'pendiente') bg-warning-light text-warning-dark
                                            @elseif($tarea->estado == 'en_progreso') bg-info-light text-info
                                            @else bg-success-light text-success 
                                            @endif">
                                            {{ ucfirst(str_replace('_', ' ', $tarea->estado)) }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('tareas.show', $tarea) }}" class="btn btn-sm btn-outline-primary rounded-circle p-2 btn-pill" data-bs-toggle="tooltip" title="Ver detalles">
                                                <i class="far fa-eye"></i>
                                            </a>
                                            @role('Admin')
                                            <a href="{{ route('tareas.edit', $tarea) }}" class="btn btn-sm btn-outline-warning rounded-circle p-2 btn-pill" data-bs-toggle="tooltip" title="Editar">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <form action="{{ route('tareas.destroy', $tarea) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle p-2 btn-pill" data-bs-toggle="tooltip" title="Eliminar" onclick="return confirm('¿Estás seguro de eliminar esta tarea?')">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </form>
                                            @endrole
                                        </div>
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'info',
            title: 'Acceso requerido',
            html: '<div class="text-center"><i class="fas fa-lock fa-3x mb-3 text-primary"></i><p>Debes iniciar sesión para acceder a esta sección</p></div>',
            confirmButtonColor: '#667eea',
            confirmButtonText: 'Entendido',
            backdrop: 'rgba(0,0,0,0.4)'
        });
    });
</script>
@endguest

<style>
    /* Estilos base del dashboard */
    .bg-gradient-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    .bg-light-primary {
        background-color: rgba(102, 126, 234, 0.1);
    }
    .bg-danger-light {
        background-color: rgba(220, 53, 69, 0.1);
    }
    .bg-warning-light {
        background-color: rgba(255, 193, 7, 0.1);
    }
    .bg-info-light {
        background-color: rgba(23, 162, 184, 0.1);
    }
    .bg-success-light {
        background-color: rgba(40, 167, 69, 0.1);
    }
    .bg-secondary-light {
        background-color: rgba(108, 117, 125, 0.1);
    }
    .text-warning-dark {
        color: #d39e00;
    }
    .rounded-3 {
        border-radius: 0.75rem !important;
    }
    .table th {
        padding-bottom: 0.75rem;
    }
    .table td {
        padding-top: 1rem;
        padding-bottom: 1rem;
    }

    /* Estilos de animación y efectos */
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

    @keyframes fadeInLeft {
        from { 
            opacity: 0;
            transform: translateX(-20px);
        }
        to { 
            opacity: 1;
            transform: translateX(0);
        }
    }
</style>

<script>
    // Activar tooltips y animaciones
    document.addEventListener('DOMContentLoaded', function() {
        // Tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

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

        // Iniciar animaciones
        animateElements();

        // Reiniciar animaciones al volver a la página
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
@endsection