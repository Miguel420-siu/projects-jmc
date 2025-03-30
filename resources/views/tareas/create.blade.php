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
                    <label for="titulo" class="form-label">Título</label>
                    <input type="text" name="titulo" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea name="descripcion" class="form-control" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="fecha_limite" class="form-label">Fecha Límite</label>
                    <input type="date" id="fecha_limite" name="fecha_limite" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="prioridad" class="form-label">Prioridad</label>
                    <select id="prioridad" name="prioridad" class="form-control" required>
                        <option value="baja">Baja</option>
                        <option value="medio">Media</option>
                        <option value="alta">Alta</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <select name="estado" class="form-control">
                        <option value="pendiente">Pendiente</option>
                        <option value="en_progreso">En progreso</option>
                        <option value="completada">Completada</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary w-100">Guardar Tarea</button>
                <a href="{{ route('tareas.index') }}" class="btn btn-secondary w-100 mt-2">Cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection
