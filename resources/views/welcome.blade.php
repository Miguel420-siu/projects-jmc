<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Proyectos y Tareas</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5dc;
            color: #333;
        }
        header {
            background-color: #d2b48c;
            color: white;
            padding: 2rem 0;
            text-align: center;
        }
        header h1 {
            font-size: 3rem;
            margin: 0;
        }
        header h3 {
            font-size: 1.5rem;
            margin-top: 0.5rem;
        }
        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 1rem;
            text-align: center;
        }
        .section {
            margin-bottom: 3rem;
        }
        h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: #d2b48c;
        }
        p {
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }
        .buttons {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }
        .button {
            display: inline-block;
            padding: 0.8rem 1.5rem;
            font-size: 1rem;
            color: white;
            background-color: #d2b48c;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #d2b48c;
        }
        .testimonials {
            background-color: #f9f9f9;
            padding: 2rem 1rem;
        }
        .testimonial {
            margin-bottom: 1.5rem;
            font-style: italic;
        }
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 1rem 0;
            margin-top: 2rem;
        }
        footer p {
            margin: 0;
            font-size: 0.9rem;
        }
        .image-section {
        text-align: center;
        margin: 2rem 0;
        }
       .responsive-image {
       max-width: 100%;
       height: auto;
       border-radius: 10px;
       box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
          </style>
</head>
<body>
    <header>
        <h1>Projects-JMC</h1>
        <h3>Gestión de Proyectos y Tareas</h3>
    </header>
    <div class="container">
        <div class="section">
            <h2>¿Qué somos?</h2>
            <p>Somos una aplicación web que te permite gestionar tus proyectos y tareas de forma sencilla y eficiente.</p>
        </div>
        <div class="section">
            <h2>¿Qué puedes hacer?</h2>
            <h3>Crear Proyectos</h3>
            <p>Crea proyectos para organizar tus tareas y actividades.</p>
            <h3>Administrar Tareas</h3>
            <p>Asigna tareas a tus proyectos y mantén un control de su estado.</p>
            <h3>Colaborar con Otros</h3>    
            <p>Invita a otros usuarios a colaborar en tus proyectos y tareas para desarrollar estas actividades en tiempo real y llevar control del progreso.</p>
            <h3>Y mucho más...</h3>
            <p>Regístrate para descubrir todas las funcionalidades que tenemos para ti.</p>
        </div>
        <div class="buttons">
            <a href="/register" class="button">Registrarse</a>
            <a href="/login" class="button">Iniciar Sesión</a>
        </div>
    </div>
    <div class="image-section">
        <img src="{{ asset('images/waza.jpg') }}" alt="Proyectos" class="responsive-image">
    <footer>
        <p>&copy; 2025 Projects-JMC. Todos los derechos reservados.</p>
        <p>Desarrollado por JMC</a></p>
    </footer>
</body>
</html>