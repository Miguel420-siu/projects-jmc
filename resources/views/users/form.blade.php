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
    @if($method === 'POST')
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" class="form-control" required>
        </div>
    @endif
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ route('users.index') }}" class="btn btn-primary">Cancelar</a>
</form>
