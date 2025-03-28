@extends('layouts.app')

@section('title', 'Crear Tarea')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header text-center">
            <h3>➕ Crear Nueva Tarea</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('tareas.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nombre_proyecto" class="form-label">Proyecto</label>
                    <select class="form-select" id="nombre_proyecto" name="nombre_proyecto" required>
                        <option value="" disabled selected>Seleccione un proyecto</option>
                        @foreach ($proyectos as $proyecto)
                            <option value="{{ $proyecto->nombre }}">{{ $proyecto->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="titulo" class="form-label">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ingrese el título de la tarea" required>
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Ingrese una descripción"></textarea>
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
