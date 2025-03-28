<form action="{{ $route }}" method="post">
    @csrf
    @if($method !== 'POST')
        @method($method)
    @endif
    <div class="mb-3">
        <label for="name" class="form-label">Nombre</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $usuario->name ?? '') }}" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Correo Electrónico</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $usuario->email ?? '') }}" required>
    </div>
    @if($method === 'POST')
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" class="form-control" required>
        </div>
    @endif
    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
</form>