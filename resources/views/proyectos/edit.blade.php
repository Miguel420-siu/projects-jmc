@extends('layouts.app')

@section('title', 'Editar Proyecto')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header text-center">
            <h3>✏️ Editar Proyecto</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('proyectos.update', $proyecto) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Campo Nombre -->
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $proyecto->nombre }}" required>
                </div>

                <!-- Campo Descripción -->
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required>{{ $proyecto->descripcion }}</textarea>
                </div>

                <!-- Campo Fecha de Inicio -->
                <div class="mb-3">
                    <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                    <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="{{ $proyecto->fecha_inicio }}" required>
                </div>

                <!-- Campo Fecha de Fin -->
                <div class="mb-3">
                    <label for="fecha_fin" class="form-label">Fecha de Fin</label>
                    <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" value="{{ $proyecto->fecha_fin }}" required>
                </div>

                <!-- Campo Estado -->
                <div class="mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <select class="form-select" id="estado" name="estado" required>
                        <option value="pendiente" {{ $proyecto->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="en_progreso" {{ $proyecto->estado == 'en_progreso' ? 'selected' : '' }}>En Progreso</option>
                        <option value="completada" {{ $proyecto->estado == 'completada' ? 'selected' : '' }}>Completada</option>
                    </select>
                </div>

                <!-- Campo Miembros -->
                <div class="mb-3">
                    <label for="miembros" class="form-label">Miembros</label>
                    <input type="text" class="form-control" id="miembros" name="miembros" value="{{ $proyecto->miembros }}" placeholder="Ingrese los miembros separados por comas" required>
                </div>

                <!-- Botones -->
                <div class="d-flex justify-content-between">
                    <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">⬅ Volver</a>
                    <button type="submit" class="btn btn-primary">💾 Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let fechaInicio = document.getElementById("fecha_inicio");
        let fechaFin = document.getElementById("fecha_fin");
        let today = new Date().toISOString().split("T")[0];

        fechaInicio.min = today; // Evita fechas anteriores a la actual

        // Si la fecha de inicio ya está seleccionada, ajusta la fecha mínima de fin
        if (fechaInicio.value) {
            fechaFin.min = fechaInicio.value;
        }

        fechaInicio.addEventListener("change", function() {
            fechaFin.min = fechaInicio.value; // La fecha de fin no puede ser anterior a la de inicio
        });
    });
</script>

@endsection
