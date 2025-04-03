@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4 animate__animated animate__fadeInUp">Bienvenido al Dashboard</h1>
        <p class="mb-5 animate__animated animate__fadeIn animate__delay-1s">Aquí puedes ver información sobre tus proyectos y tareas. ¡Administra de manera eficiente!</p>

        <div class="row">
            <!-- Tarjeta 1 -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-lg border-light animate__animated animate__zoomIn animate__delay-1s">
                    <div class="card-body">
                        <h5 class="card-title">🗂️ Proyectos</h5>
                        <p class="card-text">Aquí puedes visualizar y gestionar todos tus proyectos actuales.</p>
                        <a href="{{ route('proyectos.index') }}" class="btn btn-primary w-100">Ver Proyectos</a>
                    </div>
                </div>
            </div>
            
            <!-- Tarjeta 2 -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-lg border-light animate__animated animate__zoomIn animate__delay-2s">
                    <div class="card-body">
                        <h5 class="card-title">📋 Tareas</h5>
                        <p class="card-text">Gestiona tus tareas de forma organizada y mantente al tanto de todo.</p>
                        <a href="{{ route('tareas.index') }}" class="btn btn-info w-100">Ver Tareas</a>
                    </div>
                </div>
            </div>

            <!-- Tarjeta 3 -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-lg border-light animate__animated animate__zoomIn animate__delay-3s">
                    <div class="card-body">
                        <h5 class="card-title">👥 Usuarios</h5>
                        <p class="card-text">Visualiza los usuarios registrados y adminístralos según sea necesario.</p>
                        <a href="{{ route('users.index') }}" class="btn btn-success w-100">Ver Usuarios</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <!-- Tarjeta adicional con gráfico o estadísticas -->
            <div class="col-md-6">
                <div class="card shadow-lg border-light animate__animated animate__fadeIn animate__delay-1s">
                    <div class="card-header bg-dark text-white">
                        <h5 class="card-title">📊 Estadísticas</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Aquí puedes ver estadísticas de tus proyectos y tareas en un formato visual.</p>
                        <a href="#" class="btn btn-secondary w-100">Ver Gráficos</a>
                    </div>
                </div>
            </div>

            <!-- Tarjeta adicional con mensajes -->
            <div class="col-md-6">
                <div class="card shadow-lg border-light animate__animated animate__fadeIn animate__delay-2s">
                    <div class="card-header bg-warning text-dark">
                        <h5 class="card-title">📢 Mensajes</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Mantente al tanto de nuevos mensajes o notificaciones importantes.</p>
                        <a href="#" class="btn btn-warning w-100">Ver Mensajes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@guest
    <script>alert('Debes iniciar sesión para ver tus tareas.');</script>
@endguest
