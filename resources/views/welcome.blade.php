<!-- filepath: c:\Users\pc\Documents\Trabajos\Trabajos SENA\Desarrollo de aplicaciones en php\scfinal\final\projects-jmc\resources\views\welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Proyectos y Tareas</title>
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>
<body>
    <header>
        <h1>Projects-JMC</h1>
        <div class="header-buttons">
            <a href="/register" class="header-button">Registrarse</a>
            <a href="/login" class="header-button">Iniciar Sesión</a>
        </div>
    </header>

    <div class="hero">
        <div class="hero-content">
            <h2>Gestor de tareas y proyectos</h2>
            <p>Gestiona tus proyectos y tareas de manera sencilla y eficiente.</p>
        </div>
    </div>

    <div class="features">
        <h2>Funcionalidades</h2>
        <div class="features-grid">
            <div class="feature">
                <h3>Crear Proyectos</h3>
                <p>Crea proyectos para organizar tus tareas y actividades.</p>
            </div>
            <div class="feature">
                <h3>Administrar Tareas</h3>
                <p>Asigna tareas a tus proyectos y mantén un control de su estado.</p>
            </div>
            <div class="feature">
                <h3>Colaborar con Otros</h3>
                <p>Invita a otros usuarios a colaborar en tus proyectos y tareas.</p>
            </div>
            <div class="feature">
                <h3>Visualizar Progreso</h3>
                <p>Utiliza gráficos y estadísticas para visualizar el progreso.</p>
            </div>
            <div class="feature">
                <h3>Crear Recompensas</h3>
                <p>Crea y modifica recompensas para valorar el esfuerzo y productividad.</p>
            </div>
            <div class="feature">
                <h3>Notificaciones</h3>
                <p>Recibe notificaciones para visualizar el progreso y estar informado sobre lo que necesitas.</p>
            </div>
            <div class="feature">
                <h3>Calendario</h3>
                <p>Configura recordatorios personalizados, plazos de entrega y bloques de tiempo para maximizar tu productividad.</p>
            </div>
            <div class="feature">
                <h3>Historial de Actividades</h3>
                <p>Consulta el historial de actividades para ver el progreso de tus tareas y proyectos.</p>
            </div>
        </div>
    </div>

    <div class="contact">
        <h2>Contacto</h2>
        @if(session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif
        <form action="{{ route('comentarios.store')  }}" method="POST">
            @csrf
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" required>
    
            <label for="email">Correo Electrónico</label>
            <input type="email" id="email" name="email" placeholder="Tu correo electrónico" required>
    
            <label for="mensaje">Mensaje</label>
            <textarea id="mensaje" name="mensaje" rows="5" placeholder="Escribe tu mensaje aquí..." required></textarea>
    
            <button type="submit">Enviar</button>
        </form>
    </div>

    <footer>
        <p>&copy; 2025 Projects-JMC.</p>
        <p>Desarrollado por JMC</p>
    </footer>
</body>
</html>