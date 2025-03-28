<!-- filepath: c:\Users\pc\Documents\Trabajos\Trabajos SENA\Desarrollo de aplicaciones en php\scfinal\projects-jmc\resources\views\welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Proyectos y Tareas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #d2b48c;
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
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
            color: #d2b48c;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .header-button:hover {
            background-color: #d2b48c;
            color: white;
        }

        .hero {
            background-image: url('{{ asset('images/imagen fondo.webp') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: white;
            padding: 200px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex: 1;
        }

        .hero-text {
            flex: 1;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            margin-left: 20px;
        }

        .hero-text h2 {
            color: #d2b48c;
            margin-bottom: 10px;
        }

        .hero-text p {
            font-size: 1rem;
            color: #333;
        }

        .contact-box {
            flex: 1;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            margin-left: 20px;
        }

        .contact-box h3 {
            color: #d2b48c;
            margin-bottom: 10px;
        }

        .contact-box p {
            color: #333;
            font-size: 1rem;
        }

        .features {
            background-color: #d2b48c;
            padding: 40px 20px;
            text-align: center;
        }

        .features h2 {
            color: white;
            margin-bottom: 20px;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .feature {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .feature h3 {
            color: #d2b48c;
            margin-bottom: 10px;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
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
        <div class="hero-text">
            <h2>Gestor de tareas y proyectos</h2>
            <p>Gestiona tus proyectos y tareas de manera sencilla y eficiente.</p>
        </div>
        <div class="contact-box">
            <h3>Contáctanos</h3>
            <p>Si tienes preguntas o necesitas ayuda, no dudes en contactarnos.</p>
            <p>Email: soporte@projects-jmc.com</p>
            <p>Teléfono: +57 123 456 7890</p>
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

    <footer>
        <p>&copy; 2025 Projects-JMC.</p>
        <p>Desarrollado por JMC</p>
    </footer>
</body>
</html>