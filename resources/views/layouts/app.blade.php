<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestor de Tareas')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4A90E2;
            --primary-dark: #357ABD;
            --secondary-color: #F4F7FC;
            --accent-color: #FFD700;
            --text-color: #2C3E50;
            --light-text: #FFFFFF;
            --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.12);
            --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.15);
            --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        html, body {
            height: 100%;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--secondary-color);
            color: var(--text-color);
        }

        .wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Navbar mejorada con animación */
        .navbar {
            background-color: var(--primary-color);
            box-shadow: var(--shadow-md);
            padding: 0.8rem 1rem;
            transition: var(--transition);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--light-text) !important;
            display: flex;
            align-items: center;
            transition: var(--transition);
        }

        .navbar-brand:hover {
            transform: translateX(3px);
        }

        .navbar-brand i {
            margin-right: 0.5rem;
        }

        .nav-link {
            color: var(--light-text) !important;
            font-weight: 500;
            padding: 0.5rem 1rem;
            margin: 0 0.2rem;
            border-radius: 0.5rem;
            transition: var(--transition);
            position: relative;
        }

        .nav-link:hover, .nav-link.active {
            background-color: rgba(255, 255, 255, 0.2);
            color: var(--accent-color) !important;
            transform: translateY(-2px);
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--accent-color);
            transition: var(--transition);
        }

        .nav-link:hover::after, .nav-link.active::after {
            width: 70%;
            left: 15%;
        }

        /* Contenido principal con animación */
        .content {
            flex: 1;
            padding-top: 80px;
            padding-bottom: 40px;
            animation: fadeIn 0.5s ease-out;
        }

        /* Tarjetas mejoradas con animación */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            overflow: hidden;
            animation: fadeInUp 0.5s ease-out;
        }

        .card:hover {
            box-shadow: var(--shadow-lg);
            transform: translateY(-5px);
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, #764ba2 100%);
            color: var(--light-text);
            padding: 1rem 1.5rem;
            border-bottom: none;
        }

        /* Botones mejorados con animación */
        .btn {
            border-radius: 8px;
            font-weight: 500;
            padding: 0.5rem 1.25rem;
            transition: var(--transition);
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            box-shadow: var(--shadow-sm);
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
        }

        /* Animaciones personalizadas */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes fadeInUp {
            from { 
                opacity: 0;
                transform: translateY(20px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInDown {
            from { 
                opacity: 0;
                transform: translateY(-20px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Clases de animación */
        .animated-element {
            opacity: 0;
            animation-fill-mode: forwards;
        }

        /* Footer con animación */
        footer {
            background-color: var(--primary-color);
            color: var(--light-text);
            padding: 1.5rem 0;
            text-align: center;
            margin-top: auto;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
            animation: fadeInUp 0.5s ease-out;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1.2rem;
            }
            
            .content {
                padding-top: 70px;
            }
            
            .nav-link::after {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- Barra de navegación mejorada -->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="/dashboard">
                    <i class="fas fa-project-diagram"></i>Projects-JMC
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="/dashboard">
                                <i class="fas fa-tachometer-alt me-1"></i>Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('proyectos*') ? 'active' : '' }}" href="/proyectos">
                                <i class="fas fa-project-diagram me-1"></i>Proyectos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('tareas*') ? 'active' : '' }}" href="/tareas">
                                <i class="fas fa-tasks me-1"></i>Tareas
                            </a>
                        </li>
                        @role('Admin')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('users*') ? 'active' : '' }}" href="/users">
                                <i class="fas fa-users me-1"></i>Usuarios
                            </a>
                        </li>
                        @endrole
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <form action="/logout" method="get">
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-sign-out-alt me-1"></i>Cerrar Sesión
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Contenido principal -->
        <main class="content">
            <div class="container">
                @yield('content')
            </div>
        </main>

        <!-- Footer -->
        <footer>
            <div class="container">
                <p>&copy; 2025 Projects-JMC. Todos los derechos reservados.</p>
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Activar tooltips y animaciones
        document.addEventListener('DOMContentLoaded', function() {
            // Tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            // Animación para elementos específicos
            function animateOnScroll() {
                const elements = document.querySelectorAll('.animated-element');
                
                elements.forEach(element => {
                    const elementPosition = element.getBoundingClientRect().top;
                    const screenPosition = window.innerHeight / 1.2;
                    
                    if(elementPosition < screenPosition) {
                        const animation = element.getAttribute('data-animation') || 'fadeIn';
                        const delay = element.getAttribute('data-delay') || 0;
                        
                        setTimeout(() => {
                            element.style.animation = `${animation} 0.6s ease-out forwards`;
                        }, delay);
                    }
                });
            }

            // Ejecutar al cargar y al hacer scroll
            window.addEventListener('scroll', animateOnScroll);
            animateOnScroll();
        });
    </script>
</body>

</html>