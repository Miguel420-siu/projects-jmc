
{{-- filepath: c:\Users\AdminSena\Documents\projects-jmc\resources\views\proyectos\edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Editar Proyecto')

@section('content')
<div class="card">
    <div class="card-header">Editar Proyecto</div>
    <div class="card-body">
        <form action="{{ route('proyectos.update', $proyecto) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $proyecto->nombre }}" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion">{{ $proyecto->descripcion }}</textarea>
            </div>
            <div class="mb-3">
                <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="{{ $proyecto->fecha_inicio }}" required>
            </div>
            <div class="mb-3">
                <label for="fecha_fin" class="form-label">Fecha de Fin</label>
                <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" value="{{ $proyecto->fecha_fin }}">
            </div>
            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select class="form-select" id="estado" name="estado" required>
                    <option value="activo" {{ $proyecto->estado == 'activo' ? 'selected' : '' }}>Activo</option>
                    <option value="completado" {{ $proyecto->estado == 'completado' ? 'selected' : '' }}>Completado</option>
                    <option value="pendiente" {{ $proyecto->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</div>
@endsection