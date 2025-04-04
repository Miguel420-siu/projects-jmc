<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestor de Tareas')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Aseguramos que el body ocupe toda la pantalla */
        html, body {
            height: 100%;
            margin: 0;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #F4F7FC; /* Color de fondo suave para todo el cuerpo */
            color: #333; /* Texto oscuro para buena legibilidad */
        }

        /* Flexbox para el layout */
        .wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100%;
        }

        /* Estilo para la barra de navegación */
        .navbar {
            background-color: #4A90E2; /* Azul vibrante */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra sutil */
        }

        .navbar .navbar-brand,
        .navbar .nav-link {
            color: #fff !important;
        }

        .navbar .nav-link:hover {
            color: #FFD700 !important; /* Color dorado para el hover */
        }

        /* Estilo de las tarjetas */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        /* Estilo de botones */
        .btn-primary {
            background-color: #4A90E2;
            border-color: #4A90E2;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.15);
        }

        .btn-primary:hover {
            background-color: #357ABD;
            border-color: #357ABD;
            transform: translateY(-2px);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
        }

        /* Diseño para el encabezado */
        .content {
            flex: 1; /* Esto hace que el contenido ocupe el espacio disponible */
            margin-top: 80px;
        }

        .header-button {
            padding: 12px 18px;
            background-color: #fff;
            color: #4A90E2;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: background-color 0.3s, color 0.3s, transform 0.3s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header-button:hover {
            background-color: #4A90E2;
            color: #fff;
            transform: scale(1.05);
        }

        .navbar-toggler-icon {
            background-color: #fff;
        }

        /* Estilo para el footer */
        footer {
            background-color: #4A90E2;
            color: #fff;
            padding: 15px 0;
            text-align: center;
            margin-top: 30px;
        }

        /* Estilo para las tablas */
        .table thead {
            background-color: #4A90E2;
            color: #fff;
        }

        .table-bordered td,
        .table-bordered th {
            border-color: #ddd;
        }

        .badge {
            font-size: 0.9rem;
        }

        .alert-info {
            background-color: #E9F7FC;
            color: #4A90E2;
        }
    </style>
</head>

<body>

    <div class="wrapper">
        <!-- Barra de navegación -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <div class="container">
                <a class="navbar-brand" href="/dashboard">Projects-JMC</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/proyectos">Proyectos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/tareas">Tareas</a>
                        </li>
                        @role('Admin')
                        <li class="nav-item">
                            <a class="nav-link" href="/users">Usuarios</a>
                        </li>
                        @endrole
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <form action="/logout" method="get" class="header-buttons">
                                <button type="submit" class="btn btn-danger text-white">Cerrar Sesión</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Contenido principal -->
        <div class="container content">
            @yield('content')
        </div>

        <!-- Footer -->
        <footer>
            <p>&copy; 2025 Projects-JMC. Todos los derechos reservados.</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
