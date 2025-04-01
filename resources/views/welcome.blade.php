<!-- filepath: c:\Users\pc\Documents\Trabajos\Trabajos SENA\Desarrollo de aplicaciones en php\scfinal\final\projects-jmc\resources\views\welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Proyectos y Tareas</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #F4F6F8;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #6A6E72;
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            margin: 0;
            font-size: 2rem;
        }

        .header-buttons {
            display: flex;
            gap: 10px;
        }

        .header-button {
            padding: 10px 15px;
            background-color: #fff;
            color: #6A6E72;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease, color 0.3s ease;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .header-button:hover {
            background-color: #6A6E72;
            color: white;
        }

        .hero {
            background-image: url('{{ asset('images/imagen fondo.webp') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: white;
            padding: 100px 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .hero-content {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
        }

        .hero-content h2 {
            color: #6A6E72;
            margin-bottom: 15px;
        }

        .hero-content p {
            font-size: 1.1rem;
            color: #333;
        }

        .features {
            background-color: #fff;
            padding: 40px 20px;
            text-align: center;
        }

        .features h2 {
            color: #6A6E72;
            margin-bottom: 30px;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .feature {
            background-color: #F9FAFB;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        .feature h3 {
            color: #6A6E72;
            margin-bottom: 10px;
        }

        .contact {
            background-color: #F4F6F8;
            padding: 40px 20px;
            text-align: center;
        }

        .contact h2 {
            color: #6A6E72;
            margin-bottom: 20px;
        }

        .contact form {
            max-width: 600px;
            margin: 0 auto;
            text-align: left;
        }

        .contact form label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        .contact form input,
        .contact form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .contact form button {
            padding: 10px 20px;
            background-color: #6A6E72;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }

        .contact form button:hover {
            background-color: #555;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 15px 0;
            margin-top: auto;
        }

        footer p {
            margin: 5px 0;
        }
    </style>
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