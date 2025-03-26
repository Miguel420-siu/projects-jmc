@extends('layouts.app')

@section('title', 'Editar Tarea')

@section('content')
<div class="container">
    <h2 class="mb-4 text-center">✏ Editar Tarea</h2>

    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow">
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
                    <label for="fecha_limite">Fecha Limite:</label>
                    <input type="date" id="fecha_limite" name="fecha_limite" required>
                </div>
                <div>
                 <label for="prioridad">Prioridad:</label>
                  <select id="prioridad" name="prioridad" required>
                   <option value="baja">Baja</option>
                   <option value="medio">Media</option>
                   <option value="alta">Alta</option>
                  </select>
                </div>

                <div class="mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <select name="estado" class="form-control">
                        <option value="pendiente" {{ $tarea->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="en_progreso" {{ $tarea->estado == 'en_progreso' ? 'selected' : '' }}>En progreso</option>
                        <option value="completada" {{ $tarea->estado == 'completada' ? 'selected' : '' }}>Completada</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success w-100 mb-3">Actualizar</button>
            </form>

            <a href="{{ route('tareas.index') }}" class="btn btn-secondary w-100">Regresar al Inicio</a>
        </div>
    </div>
</div>
@endsection

