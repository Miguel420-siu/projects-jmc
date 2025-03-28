{{-- filepath: c:\Users\AdminSena\Documents\projects-jmc\resources\views\proyectos\create.blade.php --}}
@extends('layouts.app')

@section('title', 'Crear Proyecto')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header text-center">
            <h3>➕ Crear Proyecto</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('proyectos.store') }}" method="POST">
                @csrf

                <!-- Campo Nombre -->
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre del proyecto" required>
                </div>

                <!-- Campo Descripción -->
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Ingrese una descripción del proyecto" required></textarea>
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

                <!-- Campo Estado -->
                <div class="mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <select class="form-select" id="estado" name="estado" required>
                        <option value="pendiente">Pendiente</option>
                        <option value="en_progreso">En Progreso</option>
                        <option value="completado">Completado</option>
                    </select>
                </div>

                <!-- Campo Miembros -->
                <div class="mb-3">
                    <label for="miembros" class="form-label">Miembros</label>
                    <input type="text" class="form-control" id="miembros" name="miembros" placeholder="Ingrese los miembros separados por comas" required>
                </div>

                <!-- Botones -->
                <div class="d-flex justify-content-between">
                    <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">⬅ Volver</a>
                    <button type="submit" class="btn btn-primary">💾 Guardar Proyecto</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection