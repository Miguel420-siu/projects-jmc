<form action="{{ $route }}" method="POST">
    @csrf
    @if($method !== 'POST')
        @method($method)
    @endif
    <div class="mb-3">
        <label for="name" class="form-label">Nombre</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $user->name ?? '') }}" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Correo Electrónico</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $user->email ?? '') }}" required>
    </div>
    <div class="mb-3">
        <label for="rol" class="form-label">Rol</label>
        <select name="rol" class="form-control">
            <option value="trabajador" {{ old('rol', $user->rol ?? '') == 'trabajador' ? 'selected' : '' }}>Trabajador</option>
            <option value="supervisor" {{ old('rol', $user->rol ?? '') == 'supervisor' ? 'selected' : '' }}>Supervisor</option>
            <option value="admin" {{ old('rol', $user->rol ?? '') == 'admin' ? 'selected' : '' }}>Administrador</option>
        </select>
    </div>
    @if($method === 'POST')
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" class="form-control" required>
        </div>
    @endif
    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
