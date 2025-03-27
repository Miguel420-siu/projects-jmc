@extends('layouts.app')

@section('title', 'Crear Tarea')

@section('content')
<div class="container">
    <h2 class="mb-4 text-center">➕ Crear Nueva Tarea</h2>

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('tareas.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="proyecto_id" class="form-label">Número del Proyecto</label>
                    <input type="text" class="form-control" id="proyecto_id" name="proyecto_id" placeholder="Ingrese el número del proyecto">
                </div>

                <div class="mb-3">
                    <label for="titulo" class="form-label">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" required>
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                </div>
                <div class="mb-3">
                    <label for="fecha_limite" class="form-label">Fecha Límite</label>
                    <input type="date" class="form-control" id="fecha_limite" name="fecha_limite" required>
                </div>
                <div class="mb-3">
                    <label for="prioridad" class="form-label">Prioridad</label>
                    <select class="form-select" id="prioridad" name="prioridad" required>
                        <option value="alta">Alta</option>
                        <option value="media">Media</option>
                        <option value="baja">Baja</option>
                    </select>
                </div>
                
                <div class="d-flex justify-content-between">
                    <a href="{{ route('tareas.index') }}" class="btn btn-secondary">⬅ Volver al Índice</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
