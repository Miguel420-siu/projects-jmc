{{-- filepath: c:\Users\pc\Documents\Trabajos\Desarrollo\pruebas laravel\projects-jmc\resources\views\auth\register.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="hero">
    <div class="hero-text">
        <h2>Registrarse</h2>
        <p>Crea una cuenta para comenzar a gestionar tus proyectos y tareas.</p>
    </div>
    <div class="contact-box">
        {{-- Mostrar errores de validación --}}
        @if ($errors->any())
            <div style="color: red; margin-bottom: 15px;">
                <ul style="list-style: none; padding: 0;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/register" method="POST" style="display: flex; flex-direction: column; align-items: center;">
            @csrf
            <div style="margin-bottom: 15px; width: 100%;">
                <input type="text" name="name" placeholder="Nombre" value="{{ old('name') }}" required style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
            </div>
            <div style="margin-bottom: 15px; width: 100%;">
                <input type="email" name="email" placeholder="Correo Electrónico" value="{{ old('email') }}" required style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
            </div>
            <div style="margin-bottom: 15px; width: 100%;">
                <input type="password" name="password" placeholder="Contraseña" required style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
            </div>
            <div style="margin-bottom: 15px; width: 100%;">
                <input type="password" name="password_confirmation" placeholder="Confirmar Contraseña" required style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
            </div>
            <button type="submit" style="padding: 10px 20px; background-color: #d2b48c; color: white; border: none; border-radius: 5px; cursor: pointer;">
                Registrarse
            </button>
        </form>
    </div>
</div>
@endsection