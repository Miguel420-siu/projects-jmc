{{-- filepath: c:\Users\AdminSena\Documents\projects-jmc\resources\views\proyectos\create.blade.php --}}

@extends('layouts.app')

@section('title', 'Crear Proyecto')

@section('content')

@auth
<!-- Agregamos el enlace a Animate.css directamente en el archivo -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

<div class="container mt-5">
    <div class="card shadow animate__animated animate__fadeInUp">
        <div class="card-header text-center">
            <h3 class="animate__animated animate__fadeIn">➕ Crear Nuevo Proyecto</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('proyectos.store') }}" method="POST" id="create-project-form" class="animate__animated animate__fadeIn">
                @csrf

                <!-- Campo Nombre -->
                <div class="mb-3 animate__animated animate__fadeInUp">
                    <label for="nombre" class="form-label">Nombre del Proyecto</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre del proyecto" required>
                </div>

                <!-- Campo Descripción -->
                <div class="mb-3 animate__animated animate__fadeInUp">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Ingrese una descripción"></textarea>
                </div>

                <!-- Campo Fecha de Inicio -->
                <div class="mb-3 animate__animated animate__fadeInUp">
                    <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                    <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
                </div>

                <!-- Campo Fecha de Fin -->
                <div class="mb-3 animate__animated animate__fadeInUp">
                    <label for="fecha_fin" class="form-label">Fecha de Fin</label>
                    <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" required>
                </div>

                <!-- Campo Miembros -->
                <div class="mb-3 animate__animated animate__fadeInUp">
                    <label for="miembros" class="form-label">Miembros</label>
                    <input type="text" class="form-control" id="miembros" name="miembros" placeholder="Ingrese los miembros del proyecto (separados por comas)">
                </div>

                <!-- Botones -->
                <div class="d-flex justify-content-between animate__animated animate__fadeInUp">
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

        let today = new Date().toISOString().split("T")[0]; // Obtener la fecha actual en formato YYYY-MM-DD

        // La fecha de inicio no puede ser anterior a la fecha de hoy
        fechaInicio.min = today;

        // Actualizar la fecha mínima de la fecha de fin cuando se cambia la fecha de inicio
        fechaInicio.addEventListener("change", function() {
            // Si se selecciona una fecha de inicio, la fecha de fin no puede ser anterior a la fecha de inicio
            fechaFin.min = fechaInicio.value;
            // Si la fecha de fin ya está seleccionada y es menor a la fecha de inicio, ajustarla a la fecha de inicio
            if (new Date(fechaFin.value) < new Date(fechaInicio.value)) {
                fechaFin.value = fechaInicio.value;
            }
        });

        // Validación al intentar enviar el formulario
        const form = document.querySelector("form");
        form.addEventListener("submit", function(event) {
            const fechaInicioValor = new Date(fechaInicio.value);
            const fechaFinValor = new Date(fechaFin.value);

            // Si la fecha de fin es anterior a la fecha de inicio, mostramos un mensaje
            if (fechaFinValor < fechaInicioValor) {
                alert("La fecha de fin no puede ser anterior a la fecha de inicio.");
                event.preventDefault(); // Evitar que se envíe el formulario
                return;
            }

            // Si la fecha de fin es anterior a la fecha actual, mostramos un mensaje
            if (fechaFinValor < new Date(today)) {
                alert("La fecha de fin no puede ser anterior a la fecha actual.");
                event.preventDefault(); // Evitar que se envíe el formulario
                return;
            }
        });

        // Si la fecha de fin ya está seleccionada al cargar la página, validar la fecha de fin
        if (fechaFin.value && new Date(fechaFin.value) < new Date(today)) {
            alert("La fecha de fin no puede ser anterior a la fecha actual.");
        }
    });
</script>

@endauth
@endsection
