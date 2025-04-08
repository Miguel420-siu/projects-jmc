@extends('layouts.app')

@section('title', 'Detalles de la Tarea')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header text-center">
            <h3>👁 Detalles de la Tarea</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Nombre del Proyecto</th>
                        <td>{{ $tarea->nombre_proyecto }}</td>
                    </tr>
                    <tr>
                        <th>Título</th>
                        <td>{{ $tarea->titulo }}</td>
                    </tr>
                    <tr>
                        <th>Descripción</th>
                        <td>{{ $tarea->descripcion }}</td>
                    </tr>
                    <tr>
                        <th>Fecha Límite</th>
                        <td>{{ $tarea->fecha_limite }}</td>
                    </tr>
                    <tr>
                        <th>Prioridad</th>
                        <td>{{ ucfirst($tarea->prioridad) }}</td>
                    </tr>
                    <tr>
                        <th>Estado</th>
                        <td>
                            {{ ucfirst($tarea->estado) }}
                            @unlessrole('Admin') <!-- Mostrar solo si el usuario NO es Admin -->
                            <form action="{{ route('tareas.cambiarEstado', $tarea) }}" method="POST" class="mt-2">
                                @csrf
                                @method('PATCH')
                                <div class="d-flex">
                                    <select name="estado" class="form-select me-2" required>
                                        <option value="pendiente" {{ $tarea->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                        <option value="en_progreso" {{ $tarea->estado == 'en_progreso' ? 'selected' : '' }}>En Progreso</option>
                                        <option value="completada" {{ $tarea->estado == 'completada' ? 'selected' : '' }}>Completada</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                </div>
                            </form>
                            @endunlessrole
                        </td>
                    </tr>
                    <tr>
                        <th>Asignado a</th>
                        <td>
                            {{ $tarea->asignadoA ? $tarea->asignadoA->name : 'No asignado' }}
                            @role('Admin')
                            <form action="{{ route('tareas.asignarUsuario', $tarea) }}" method="POST" class="mt-2">
                                @csrf
                                <div class="d-flex">
                                    <select name="asignado_a" class="form-select me-2" required>
                                        <option value="" {{ is_null($tarea->asignado_a) ? 'selected' : '' }}>No asignado</option>
                                        @foreach ($usuarios as $user)
                                            <option value="{{ $user->id }}" {{ $tarea->asignado_a == $user->id ? 'selected' : '' }}>
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-primary">Asignar</button>
                                </div>
                            </form>
                            @endrole
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="mt-4 d-flex justify-content-between">
                <a href="{{ route('tareas.index') }}" class="btn btn-secondary">⬅ Volver a Tareas</a>
                @role('Admin')
                <a href="{{ route('tareas.edit', $tarea) }}" class="btn btn-warning">✏ Editar Tarea</a>
                <form action="{{ route('tareas.destroy', $tarea) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta tarea?')">🗑️ Eliminar Tarea</button>
                </form>
                @endrole
            </div>
        </div>
    </div>
</div>
@endsection
