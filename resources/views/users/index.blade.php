@extends('layouts.app') <!-- Extiende el layout base -->

@section('content') <!-- Sección del contenido de esta vista -->

    <div class="mb-3 d-flex justify-content-between">
        <!-- Botón para regresar a la lista de proyectos -->
        <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">⬅️ Regresar</a>

        <!-- Formulario de búsqueda -->
        <form action="{{ route('users.index') }}" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control" placeholder="Buscar por nombre, email o rol" value="{{ request()->search }}">
            <button type="submit" class="btn btn-primary ms-2">Buscar</button>
        </form>
    </div>

    @if($users->isEmpty())
        <div class="alert alert-info text-center">
            No hay usuarios registrados.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-hover text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="userTable">
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="badge 
                                    @if($user->rol == 'admin') bg-danger 
                                    @elseif($user->rol == 'supervisor') bg-warning 
                                    @else bg-secondary 
                                    @endif">
                                    {{ ucfirst($user->rol) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-outline-warning">✏️ Editar</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Estás seguro de eliminar este usuario?')">🗑️ Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <!-- Paginación -->
        <div class="d-flex justify-content-center">
            {{ $users->links() }}
        </div>
    @endif

@endsection <!-- Cierra la sección de contenido -->
