<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Proyectos | Projects-JMC</title>
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

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text-color);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Animaciones */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes fadeInUp {
            from { 
                opacity: 0;
                transform: translateY(30px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInDown {
            from { 
                opacity: 0;
                transform: translateY(-30px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInLeft {
            from { 
                opacity: 0;
                transform: translateX(-30px);
            }
            to { 
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animated {
            opacity: 0;
            animation-fill-mode: forwards;
        }

        /* Encabezado con animación */
        header {
            background: linear-gradient(135deg, var(--primary-color) 0%, #764ba2 100%);
            color: var(--light-text);
            padding: 1.5rem 0;
            box-shadow: var(--shadow-md);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            animation: fadeInDown 0.8s ease-out forwards;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .logo {
            font-weight: 700;
            font-size: 1.8rem;
            display: flex;
            align-items: center;
            color: var(--light-text);
            text-decoration: none;
            transition: var(--transition);
        }

        .logo:hover {
            transform: translateX(5px);
        }

        .logo i {
            margin-right: 0.8rem;
            font-size: 1.5rem;
        }

        .header-buttons {
            display: flex;
            gap: 1.5rem;
        }

        .header-button {
            padding: 0.6rem 1.8rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
        }

        .btn-register {
            background-color: var(--light-text);
            color: var(--primary-color);
        }

        .btn-login {
            background-color: transparent;
            color: var(--light-text);
            border: 2px solid var(--light-text);
        }

        .header-button:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-sm);
        }

        /* Hero section con animación */
        .hero {
            background: linear-gradient(rgba(74, 144, 226, 0.9), rgba(74, 144, 226, 0.9)), 
                        url('https://images.unsplash.com/photo-1467232004584-a241de8bcf5d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: var(--light-text);
            padding-top: 80px;
        }

        .hero-content {
            max-width: 800px;
            padding: 0 2rem;
            animation: fadeIn 1s ease-out 0.3s forwards;
            opacity: 0;
        }

        .hero h1 {
            font-size: 2.8rem;
            margin-bottom: 1.5rem;
            font-weight: 600;
            animation: fadeInUp 0.8s ease-out 0.5s forwards;
            opacity: 0;
        }

        .hero p {
            font-size: 1.3rem;
            margin-bottom: 0;
            opacity: 0.9;
            animation: fadeInUp 0.8s ease-out 0.7s forwards;
            opacity: 0;
        }

        /* Sección de beneficios con animación */
        .key-benefits {
            padding: 5rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-title {
            text-align: center;
            font-size: 2.2rem;
            margin-bottom: 3rem;
            color: var(--primary-dark);
            animation: fadeIn 0.8s ease-out forwards;
        }

        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2.5rem;
        }

        .benefit-card {
            background: var(--light-text);
            border-radius: 12px;
            padding: 2.5rem 2rem;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            text-align: center;
            opacity: 0;
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .benefit-card:nth-child(1) { animation-delay: 0.3s; }
        .benefit-card:nth-child(2) { animation-delay: 0.5s; }
        .benefit-card:nth-child(3) { animation-delay: 0.7s; }

        .benefit-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
        }

        .benefit-icon {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
        }

        .benefit-title {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: var(--primary-dark);
        }

        /* Sección de contacto con animación */
        .contact-section {
            background-color: var(--secondary-color);
            padding: 5rem 2rem;
        }

        .contact-container {
            max-width: 800px;
            margin: 0 auto;
            background: var(--light-text);
            border-radius: 12px;
            padding: 3rem;
            box-shadow: var(--shadow-sm);
            animation: fadeInUp 0.8s ease-out forwards;
            opacity: 0;
        }

        .contact-title {
            text-align: center;
            font-size: 2.2rem;
            margin-bottom: 2rem;
            color: var(--primary-dark);
        }

        .contact-form {
            display: grid;
            gap: 1.5rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-label {
            margin-bottom: 0.5rem;
            font-weight: 500;
        }

        .form-control {
            padding: 0.8rem 1rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: var(--transition);
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.2);
            outline: none;
        }

        textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }

        .submit-btn {
            background-color: var(--primary-color);
            color: var(--light-text);
            border: none;
            padding: 1rem;
            border-radius: 8px;
            font-weight: 500;
            font-size: 1.1rem;
            cursor: pointer;
            transition: var(--transition);
        }

        .submit-btn:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        /* Footer con animación */
        footer {
            background-color: var(--primary-color);
            color: var(--light-text);
            text-align: center;
            padding: 2.5rem 1rem;
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .footer-text {
            margin: 0;
            font-size: 1rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header-container {
                padding: 0 1rem;
                flex-direction: column;
                gap: 1rem;
            }
            
            .logo {
                font-size: 1.5rem;
            }
            
            .header-buttons {
                width: 100%;
                justify-content: center;
                gap: 1rem;
            }
            
            .hero h1 {
                font-size: 2.2rem;
            }
            
            .hero p {
                font-size: 1.1rem;
            }
            
            .benefits-grid {
                grid-template-columns: 1fr;
            }
            
            .contact-container {
                padding: 2rem 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Encabezado -->
    <header>
        <div class="header-container">
            <a href="/" class="logo">
                <i class="fas fa-project-diagram"></i>
                Projects-JMC
            </a>
            <div class="header-buttons">
                <a href="/register" class="header-button btn-register">Registrarse</a>
                <a href="/login" class="header-button btn-login">Iniciar Sesión</a>
            </div>
        </div>
    </header>

    <!-- Hero section -->
    <div class="hero">
        <div class="hero-content">
            <h1>Gestión profesional de proyectos</h1>
            <p>La solución todo en uno para organizar tus tareas y colaborar con tu equipo</p>
        </div>
    </div>

    <!-- Beneficios clave -->
    <div class="key-benefits">
        <h2 class="section-title">Nuestras ventajas</h2>
        <div class="benefits-grid">
            <div class="benefit-card">
                <div class="benefit-icon">
                    <i class="fas fa-tasks"></i>
                </div>
                <h3 class="benefit-title">Gestión Intuitiva</h3>
                <p>Crea y organiza tus proyectos con una interfaz sencilla y poderosa.</p>
            </div>
            <div class="benefit-card">
                <div class="benefit-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3 class="benefit-title">Trabajo en Equipo</h3>
                <p>Colabora fácilmente con miembros de tu equipo en tiempo real.</p>
            </div>
            <div class="benefit-card">
                <div class="benefit-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3 class="benefit-title">Seguimiento Visual</h3>
                <p>Monitorea el progreso con herramientas visuales claras.</p>
            </div>
        </div>
    </div>

    <!-- Sección de contacto -->
    <div class="contact-section">
        <div class="contact-container">
            <h2 class="contact-title">Contáctanos</h2>
            
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
            <form class="contact-form" action="{{ route('comentarios.store') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Tu nombre" required>
                </div>
                
                <div class="form-group">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Tu correo electrónico" required>
                </div>
                
                <div class="form-group">
                    <label for="mensaje" class="form-label">Mensaje</label>
                    <textarea id="mensaje" name="mensaje" class="form-control" rows="5" placeholder="Escribe tu mensaje aquí..." required></textarea>
                </div>
                
                <button type="submit" class="submit-btn">Enviar Mensaje</button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p class="footer-text">&copy; 2025 Projects-JMC. Todos los derechos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Función para animar elementos al hacer scroll
        function animateOnScroll() {
            const elements = document.querySelectorAll('.animated');
            const windowHeight = window.innerHeight;
            
            elements.forEach(element => {
                const elementPosition = element.getBoundingClientRect().top;
                const animation = element.dataset.animation || 'fadeIn';
                const delay = element.dataset.delay || 0;
                
                if(elementPosition < windowHeight - 100) {
                    setTimeout(() => {
                        element.style.animation = `${animation} 0.8s ease-out forwards`;
                    }, delay);
                }
            });
        }
        
        // Ejecutar al cargar y al hacer scroll
        document.addEventListener('DOMContentLoaded', animateOnScroll);
        window.addEventListener('scroll', animateOnScroll);
    </script>
</body>
</html>