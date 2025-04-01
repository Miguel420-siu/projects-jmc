{{-- filepath: c:\Users\AdminSena\Documents\projects-jmc\resources\views\proyectos\create.blade.php --}}
@extends('layouts.app')

@section('title', 'Crear Proyecto')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header text-center">
            <h3>➕ Crear Nuevo Proyecto</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('proyectos.store') }}" method="POST">
                @csrf

                <!-- Campo Nombre -->
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del Proyecto</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre del proyecto" required>
                </div>

                <!-- Campo Descripción -->
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Ingrese una descripción"></textarea>
                </div>

                <!-- Campo Fecha de Inicio -->
                <div class="mb-3">
                    <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                    <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
                </div>

                <!-- Campo Fecha de Fin -->
                <div class="mb-3">
                    <label for="fecha_fin" class="form-label">Fecha de Fin</label>
                    <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" required>
                </div>

                <!-- Campo Miembros -->
                <div class="mb-3">
                    <label for="miembros" class="form-label">Miembros</label>
                    <input type="text" class="form-control" id="miembros" name="miembros" placeholder="Ingrese los miembros del proyecto (separados por comas)">
                </div>

                <!-- Botones -->
                <div class="d-flex justify-content-between">
                    <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">⬅ Volver al Índice</a>
                    <button type="submit" class="btn btn-primary">Guardar Proyecto</button>
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

        fechaInicio.min = today; // Fecha de inicio mínima es hoy

        fechaInicio.addEventListener("change", function() {
            fechaFin.min = fechaInicio.value; // La fecha de fin no puede ser anterior a la de inicio
        });
    });
</script>

@endsection
