@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center">📋 Lista de Usuarios</h2>
    
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('usuarios.create') }}" class="btn btn-primary">➕ Agregar Usuario</a>
        <input type="text" id="search" class="form-control w-25" placeholder="🔍 Buscar usuario...">
    </div>
    
    <div class="card p-4">
        @if($usuarios->isEmpty())
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
                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->id }}</td>
                                <td>{{ $usuario->name }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>
                                    <span class="badge 
                                        @if($usuario->role == 'admin') bg-danger 
                                        @elseif($usuario->role == 'editor') bg-warning 
                                        @else bg-secondary 
                                        @endif">
                                        {{ ucfirst($usuario->role) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-sm btn-outline-warning">✏️ Editar</a>
                                    <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="post" class="d-inline">
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
            <div class="d-flex justify-content-center">
                {{ $usuarios->links() }}
            </div>
        @endif
    </div>
</div>

<script>
    document.getElementById('search').addEventListener('keyup', function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('#userTable tr');
        rows.forEach(row => {
            let text = row.innerText.toLowerCase();
            row.style.display = text.includes(filter) ? '' : 'none';
        });
    });
</script>
@endsection
