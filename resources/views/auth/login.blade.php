{{-- filepath: c:\Users\pc\Documents\Trabajos\Desarrollo\pruebas laravel\projects-jmc\resources\views\auth\login.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="hero">
    <div class="hero-text">
        <h2>Iniciar Sesión</h2>
        <p>Accede a tu cuenta para gestionar tus proyectos y tareas.</p>
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

        <form action="/login" method="POST" style="display: flex; flex-direction: column; align-items: center;">
            @csrf
            <div style="margin-bottom: 15px; width: 100%;">
                <input type="email" name="email" placeholder="Correo Electrónico" value="{{ old('email') }}" required style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
            </div>
            <div style="margin-bottom: 15px; width: 100%;">
                <input type="password" name="password" placeholder="Contraseña" required style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
            </div>
            <button type="submit" style="padding: 10px 20px; background-color: #6A6E72; color: white; border: none; border-radius: 5px; cursor: pointer;">
                Iniciar Sesión
            </button>
        </form>
    </div>
</div>
@endsection