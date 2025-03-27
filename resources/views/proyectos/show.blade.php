{{-- filepath: c:\Users\AdminSena\Documents\projects-jmc\resources\views\proyectos\show.blade.php --}}
@extends('layouts.app')

@section('title', 'Detalles del Proyecto')

@section('content')
<div class="card">
    <div class="card-header">Detalles del Proyecto</div>
    <div class="card-body">
        <h5>Nombre: {{ $proyecto->nombre }}</h5>
        <p>Descripción: {{ $proyecto->descripcion }}</p>
        <p>Fecha de Inicio: {{ $proyecto->fecha_inicio }}</p>
        <p>Fecha de Fin: {{ $proyecto->fecha_fin }}</p>
        <p>Estado: {{ ucfirst($proyecto->estado) }}</p>
        <p>Miembros: {{ $proyecto->miembros }}</p>

        <h5 class="mt-4">Tareas Asociadas:</h5>
        @if($proyecto->tareas->isEmpty())
            <p>No hay tareas asociadas a este proyecto.</p>
        @else
            <ul>
                @foreach ($proyecto->tareas as $tarea)
                    <li>{{ $tarea->titulo }} - {{ ucfirst($tarea->estado) }}</li>
                @endforeach
            </ul>
        @endif

        <div class="mt-4">
            <a href="{{ route('proyectos.edit', $proyecto) }}" class="btn btn-warning">✏️ Editar Proyecto</a>
            <form action="{{ route('proyectos.destroy', $proyecto) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este proyecto?')">🗑️ Eliminar Proyecto</button>
            </form>
            <a href="{{ route('tareas.create', $proyecto->id) }}" class="btn btn-primary">➕ Crear Tarea</a>
            <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">⬅️ Volver a Proyectos</a>
        </div>
    </div>
</div>
@endsection