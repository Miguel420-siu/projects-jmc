
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
        <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">Volver</a>
    </div>
</div>
@endsection