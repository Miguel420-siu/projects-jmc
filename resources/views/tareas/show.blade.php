@extends('layouts.app')

@section('title', 'Detalles de la Tarea')

@section('content')
<div class="container">
    <h2 class="mb-4 text-center">👁 Detalles de la Tarea</h2>

    <div class="card shadow">
        <div class="card-body">
            <h3>{{ $tarea->titulo }}</h3>
            <p><strong>Descripción:</strong> {{ $tarea->descripcion }}</p>
            <p><strong>Fecha Limite:</strong> {{ $tarea->fecha_limite }}</p>
            <p><strong>Prioridad:</strong> {{ ucfirst($tarea->prioridad) }}</p>
            <p><strong>Estado:</strong> 
                <span class="badge bg-{{ $tarea->estado == 'pendiente' ? 'warning' : ($tarea->estado == 'en_progreso' ? 'primary' : 'success') }}">
                    {{ ucfirst($tarea->estado) }}
                </span>
            </p>
            <p><strong>Proyecto Asociado:</strong> 
    @if ($tarea->proyecto)
        {{ $tarea->proyecto->nombre }}
    @else
        <span class="text-muted">Sin proyecto asociado</span>
    @endif
</p>
            <p><strong>Número del Proyecto:</strong> {{ $tarea->proyecto_id }}</p>

            <a href="{{ route('tareas.index') }}" class="btn btn-secondary">⬅ Volver</a>
            <a href="{{ route('tareas.edit', $tarea) }}" class="btn btn-warning">✏ Editar</a>
        </div>
    </div>
</div>
@endsection
