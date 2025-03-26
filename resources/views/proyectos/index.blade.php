
{{-- filepath: c:\Users\AdminSena\Documents\projects-jmc\resources\views\proyectos\index.blade.php --}}
@extends('layouts.app')

@section('title', 'Lista de Proyectos')

@section('content')
<div class="card">
    <div class="card-header">Proyectos</div>
    <div class="card-body">
        <a href="{{ route('proyectos.create') }}" class="btn btn-primary mb-3">Crear Proyecto</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proyectos as $proyecto)
                <tr>
                    <td>{{ $proyecto->nombre }}</td>
                    <td>{{ ucfirst($proyecto->estado) }}</td>
                    <td>
                        <a href="{{ route('proyectos.show', $proyecto) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('proyectos.edit', $proyecto) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('proyectos.destroy', $proyecto) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection