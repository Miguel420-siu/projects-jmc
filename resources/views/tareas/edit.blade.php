@extends('layouts.app')

@section('title', 'Editar Tarea')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header text-center">
            <h3>✏ Editar Tarea</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('tareas.update', $tarea) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="titulo" class="form-label">Título</label>
                    <input type="text" name="titulo" class="form-control" value="{{ $tarea->titulo }}" required>
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea name="descripcion" class="form-control" rows="3">{{ $tarea->descripcion }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="fecha_limite" class="form-label">Fecha Límite</label>
                    <input type="date" name="fecha_limite" class="form-control" value="{{ $tarea->fecha_limite }}" required>
                </div>

                <div class="mb-3">
                    <label for="nombre_proyecto" class="form-label">Proyecto</label>
                    <select class="form-select" id="nombre_proyecto" name="nombre_proyecto" required>
                        @foreach ($proyectos as $proyecto)
                            <option value="{{ $proyecto->nombre }}" {{ $tarea->nombre_proyecto == $proyecto->nombre ? 'selected' : '' }}>
                                {{ $proyecto->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="prioridad" class="form-label">Prioridad</label>
                    <select name="prioridad" class="form-select" required>
                        <option value="baja" {{ $tarea->prioridad == 'baja' ? 'selected' : '' }}>Baja</option>
                        <option value="media" {{ $tarea->prioridad == 'media' ? 'selected' : '' }}>Media</option>
                        <option value="alta" {{ $tarea->prioridad == 'alta' ? 'selected' : '' }}>Alta</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <select name="estado" class="form-select">
                        <option value="pendiente" {{ $tarea->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="en_progreso" {{ $tarea->estado == 'en_progreso' ? 'selected' : '' }}>En progreso</option>
                        <option value="completada" {{ $tarea->estado == 'completada' ? 'selected' : '' }}>Completada</option>
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('tareas.index') }}" class="btn btn-secondary">⬅ Volver al Índice</a>
                    <button type="submit" class="btn btn-success">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

