@extends('layouts.app')

@section('title', 'Gestión de Proyectos')

@section('content')
@auth
<div class="container py-4 animated-element" data-animation="fadeIn">
    <!-- Tarjeta principal con animación -->
    <div class="card border-0 shadow-lg rounded-3 overflow-hidden card-hover animated-element" data-animation="fadeInUp" data-delay="100">
        <!-- Encabezado con gradiente animado -->
        <div class="card-header bg-gradient-primary text-white py-3 animated-element" data-animation="fadeInDown">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <i class="fas fa-project-diagram fa-lg me-3"></i>
                    <h2 class="h5 mb-0 fw-light">Gestión de Proyectos</h2>
                    <a href="{{ route('tareas.index') }}" class="btn btn-outline-light btn-sm rounded-pill ms-3 btn-pill">
                        <i class="fas fa-tasks me-1"></i> Ir a Tareas
                    </a>
                </div>
                @role('Admin')
                <a href="{{ route('proyectos.create') }}" class="btn btn-light btn-sm rounded-pill shadow-sm px-3 btn-pill">
                    <i class="fas fa-plus-circle me-1"></i> Nuevo Proyecto
                </a>
                @endrole
            </div>
        </div>
        
        <!-- Cuerpo de la tarjeta con animación escalonada -->
        <div class="card-body p-4">
            <!-- Filtros mejorados con animación -->
            <form method="GET" action="{{ route('proyectos.index') }}" class="mb-4 animated-element" data-animation="fadeIn" data-delay="200">
                <div class="row g-3 align-items-end">
                    <!-- Filtro por nombre -->
                    <div class="col-md-3">
                        <label class="form-label small text-muted mb-1">Nombre</label>
                        <select name="nombre" class="form-select">
                            <option value="">Todos los proyectos</option>
                            @foreach ($proyectosDisponibles as $proyecto)
                                <option value="{{ $proyecto->nombre }}" {{ request('nombre') == $proyecto->nombre ? 'selected' : '' }}>
                                    {{ $proyecto->nombre }}
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

                    <!-- Filtro por Fecha de Inicio -->
                    <div class="col-md-2">
                        <label class="form-label small text-muted mb-1">Inicio</label>
                        <input type="date" name="fecha_inicio" class="form-control" value="{{ request('fecha_inicio') }}">
                    </div>

                    <!-- Filtro por Fecha de Fin -->
                    <div class="col-md-2">
                        <label class="form-label small text-muted mb-1">Fin</label>
                        <input type="date" name="fecha_fin" class="form-control" value="{{ request('fecha_fin') }}">
                    </div>

                    <!-- Botones de acción -->
                    <div class="col-md-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary rounded-pill me-2 px-3 flex-grow-1 btn-pill">
                            <i class="fas fa-filter me-1"></i> Filtrar
                        </button>
                        <a href="{{ route('proyectos.index') }}" class="btn btn-outline-secondary rounded-pill px-3 flex-grow-1 btn-pill">
                            <i class="fas fa-sync-alt me-1"></i> Limpiar
                        </a>
                    </div>
                    <!-- Botón para descargar PDF -->
                    <a href="{{ route('proyectos.exportar.pdf', request()->query()) }}" class="btn btn-danger">
                        Exportar PDF
                    </a>
                </div>
            </form>

            <!-- Tabla de proyectos con animación de filas -->
            @if($proyectos->isEmpty())
                <div class="alert bg-light-primary border border-primary text-primary rounded-3 text-center py-4 animated-element" data-animation="fadeIn" data-delay="300">
                    <i class="fas fa-folder-open fa-2x mb-3"></i>
                    <h5 class="mb-3">No se encontraron proyectos</h5>
                    @role('Admin')
                    <a href="{{ route('proyectos.create') }}" class="btn btn-primary rounded-pill btn-pill">
                        <i class="fas fa-plus-circle me-1"></i> Crear Proyecto
                    </a>
                    @endrole
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-borderless table-hover align-middle">
                        <thead>
                            <tr class="border-bottom animated-element" data-animation="fadeIn" data-delay="200">
                                <th class="text-start text-muted fw-normal small text-uppercase">Nombre</th>
                                <th class="text-start text-muted fw-normal small text-uppercase">Descripción</th>
                                <th class="text-center text-muted fw-normal small text-uppercase">Inicio</th>
                                <th class="text-center text-muted fw-normal small text-uppercase">Fin</th>
                                <th class="text-center text-muted fw-normal small text-uppercase">Miembros</th>
                                <th class="text-center text-muted fw-normal small text-uppercase">Estado</th>
                                <th class="text-center text-muted fw-normal small text-uppercase">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($proyectos as $index => $proyecto)
                                <tr class="border-bottom hover-highlight animated-element" data-animation="fadeInLeft" data-delay="{{ 300 + ($index * 50) }}">
                                    <td class="text-start fw-medium">{{ $proyecto->nombre }}</td>
                                    <td class="text-start text-truncate" style="max-width: 200px;" title="{{ $proyecto->descripcion }}">
                                        {{ $proyecto->descripcion }}
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-light text-dark border rounded-pill px-3">
                                            {{ \Carbon\Carbon::parse($proyecto->fecha_inicio)->format('d/m/Y') }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-light text-dark border rounded-pill px-3">
                                            {{ \Carbon\Carbon::parse($proyecto->fecha_fin)->format('d/m/Y') }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-secondary-light text-secondary rounded-pill px-3">
                                            {{ $proyecto->miembros }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge rounded-pill px-3 
                                            @if($proyecto->estado == 'pendiente') bg-warning-light text-warning-dark
                                            @elseif($proyecto->estado == 'en_progreso') bg-info-light text-info
                                            @else bg-success-light text-success 
                                            @endif">
                                            {{ ucfirst(str_replace('_', ' ', $proyecto->estado)) }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('proyectos.show', $proyecto) }}" class="btn btn-sm btn-outline-primary rounded-circle p-2 btn-pill" data-bs-toggle="tooltip" title="Ver detalles">
                                                <i class="far fa-eye"></i>
                                            </a>
                                            @role('Admin')
                                            <a href="{{ route('proyectos.edit', $proyecto) }}" class="btn btn-sm btn-outline-warning rounded-circle p-2 btn-pill" data-bs-toggle="tooltip" title="Editar">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <form action="{{ route('proyectos.destroy', $proyecto) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle p-2 btn-pill" data-bs-toggle="tooltip" title="Eliminar" onclick="return confirm('¿Estás seguro de eliminar este proyecto?')">
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

<style>
    /* Estilos base del dashboard */
    .bg-gradient-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    .bg-light-primary {
        background-color: rgba(102, 126, 234, 0.1);
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
    .hover-highlight:hover {
        background-color: rgba(0, 0, 0, 0.02);
        transition: background-color 0.2s ease;
    }
    .table th {
        border-top: none;
        padding-bottom: 0.75rem;
    }
    .table td {
        padding-top: 1rem;
        padding-bottom: 1rem;
        vertical-align: middle;
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

        // Efecto hover para filas
        const filas = document.querySelectorAll('.hover-highlight');
        filas.forEach(fila => {
            fila.addEventListener('mouseenter', function() {
                fila.style.transform = 'translateX(5px)';
                fila.style.transition = 'transform 0.3s ease';
            });
            fila.addEventListener('mouseleave', function() {
                fila.style.transform = 'translateX(0)';
            });
        });
    });
</script>
@endsection