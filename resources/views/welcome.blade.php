<!-- filepath: c:\Users\pc\Documents\Trabajos\Trabajos SENA\Desarrollo de aplicaciones en php\projects-jmc\resources\views\welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Proyectos y Tareas</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        header {
            background-color:#d2b48c;
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            z-index: 2;
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
            position: relative;
            text-align: center;
            color: white;
        }

        .hero img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            filter: brightness(70%);
        }

        .hero-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
        }

        .hero-text h1 {
            font-size: 3rem;
            margin: 0;
        }

        .hero-text p {
            font-size: 1.2rem;
            margin-top: 10px;
        }

        .container {
            padding: 20px;
            max-width: 1200px;
            margin: auto;
        }

        .section {
            margin-bottom: 30px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .section h2 {
            color: #d2b48c;
            margin-bottom: 10px;
        }

        .section h3 {
            color: #c39a5c;
            margin-top: 15px;
        }

        .buttons {
            text-align: center;
            margin-top: 20px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            background-color: #d2b48c;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #c39a5c;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            margin-top: 20px;
        }

        footer p {
            margin: 5px 0;
        }

        footer a {
            color: #d2b48c;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
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
        <img src="{{ asset('images/imagen fondo.webp') }}" alt="Fondo de Proyectos">
        <div class="hero-text">
            <h1>Bienvenido a Projects-JMC</h1>
            <p>Gestiona tus proyectos y tareas de manera eficiente y colaborativa.</p>
        </div>
    </div>
    <div class="container">
        <div class="section">
            <h2>¿Qué somos?</h2>
            <p>Somos un software que te permite gestionar tus proyectos y tareas de forma simple, sencilla y eficiente, para que tengas el control de lo que necesitas.</p>
        </div>
        <div class="section">
            <h2>¿Qué puedes hacer?</h2>
            <h3>Crear Proyectos</h3>
            <p>Crea proyectos para organizar tus tareas y actividades.</p>
            <h3>Administrar Tareas</h3>
            <p>Asigna tareas a tus proyectos y mantén un control de su estado.</p>
            <h3>Colaborar con Otros</h3>    
            <p>Invita a otros usuarios a colaborar en tus proyectos y tareas para desarrollar estas actividades en tiempo real y llevar control del progreso.</p>
            <h3>Visualizar Progreso</h3>
            <p>Utiliza gráficos y estadísticas para visualizar el progreso de tus proyectos y tareas.</p>
            <h3>Notificaciones</h3>
            <p>Recibe notificaciones sobre cambios y actualizaciones en tus proyectos y tareas.</p>
            <h3>Recompensas</h3>
            <p>Configura recompensas por completar tareas y proyectos, para recompensar el esfuerzo y la productividad.</p>
            <h3>Y mucho más...</h3>
            <p>Regístrate para descubrir todas las funcionalidades.</p>
        </div>
    
    </div>
    <footer>
        <p>&copy; 2025 Projects-JMC.</p>
        <p>Desarrollado por JMC</p>
    </footer>
</body>
</html>