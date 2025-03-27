{{-- filepath: c:\Users\AdminSena\Documents\projects-jmc\resources\views\proyectos\create.blade.php --}}
@extends('layouts.app')

@section('title', 'Crear Proyecto')

@section('content')
<div class="card">
    <div class="card-header">Crear Proyecto</div>
    <div class="card-body">
        <form action="{{ route('proyectos.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
            </div>
            <div class="mb-3">
                <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
            </div>
            <div class="mb-3">
                <label for="fecha_fin" class="form-label">Fecha de Fin</label>
                <input type="date" class="form-control" id="fecha_fin" name="fecha_fin">
            </div>
            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select class="form-select" id="estado" name="estado" required>
                    <option value="activo">Activo</option>
                    <option value="completado">Completado</option>
                    <option value="pendiente">Pendiente</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="miembros" class="form-label">Miembros del Proyecto</label>
                <input type="text" class="form-control" id="miembros" name="miembros" placeholder="Ingrese los miembros separados por comas">
            </div>
            <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
@endsection