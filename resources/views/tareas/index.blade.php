{{-- filepath: c:\Users\pc\Documents\Trabajos\Desarrollo\pruebas laravel\projects-jmc\resources\views\tareas\index.blade.php --}}
@extends('layouts.app')

@section('content')
@auth
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-center m-0">📋 Lista de Tareas</h2>
        <form action="/logout" method="POST" class="m-0">
            @csrf
            <button type="submit" class="btn btn-outline-danger">Cerrar sesión</button>
        </form>
    </div>

    <div class="alert alert-info text-center">
        Hola {{ Auth::user()->name }}, aquí puedes gestionar tus tareas.
    </div>

    <a href="{{ route('tareas.create') }}" class="btn btn-primary mb-3">➕ Crear Nueva Tarea</a>

    <div class="card p-4">
        @if($tareas->isEmpty())
            <div class="alert alert-info text-center">
                No hay tareas registradas.
            </div>
        @else
            <table class="table table-hover text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tareas as $tarea)
                        <tr>
                            <td>{{ $tarea->id }}</td>
                            <td>{{ $tarea->titulo }}</td>
                            <td>
                                <span class="badge 
                                    @if($tarea->estado == 'pendiente') bg-warning 
                                    @elseif($tarea->estado == 'en_progreso') bg-info 
                                    @else bg-success 
                                    @endif">
                                    {{ ucfirst($tarea->estado) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('tareas.show', $tarea) }}" class="btn btn-sm btn-outline-info">👁️ Ver</a>
                                <a href="{{ route('tareas.edit', $tarea) }}" class="btn btn-sm btn-outline-warning">✏️ Editar</a>
                                <form action="{{ route('tareas.destroy', $tarea) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Estás seguro de eliminar esta tarea?')">
                                        🗑️ Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endauth

@guest
    <script>alert('Debes iniciar sesión para ver tus tareas.');</script>
@endguest
@endsection