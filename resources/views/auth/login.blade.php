<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Projects-JMC</title>
    
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
            background-color: var(--secondary-color);
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
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

        @keyframes fadeInRight {
            from { 
                opacity: 0;
                transform: translateX(30px);
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

        /* Contenedor principal */
        .login-container {
            display: flex;
            flex: 1;
            min-height: calc(100vh - 60px);
        }

        /* Sección izquierda con animación */
        .left-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, #764ba2 100%);
            color: var(--light-text);
            width: 40%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            text-align: center;
            animation: fadeInLeft 0.8s ease-out forwards;
        }

        .logo {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 2rem;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
        }

        .logo:hover {
            transform: translateX(5px);
        }

        .logo i {
            margin-right: 0.8rem;
        }

        .welcome-text {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            max-width: 400px;
        }

        .features-list {
            text-align: left;
            max-width: 400px;
            margin-top: 2rem;
        }

        .feature-item {
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
        }

        .feature-icon {
            margin-right: 0.8rem;
            color: var(--accent-color);
        }

        /* Sección derecha con animación */
        .right-section {
            width: 60%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            animation: fadeInRight 0.8s ease-out 0.2s forwards;
            opacity: 0;
        }

        .login-box {
            background: var(--light-text);
            border-radius: 12px;
            padding: 3rem;
            box-shadow: var(--shadow-md);
            width: 100%;
            max-width: 500px;
            transition: var(--transition);
        }

        .login-box:hover {
            box-shadow: var(--shadow-lg);
        }

        .login-title {
            font-size: 2rem;
            color: var(--primary-dark);
            margin-bottom: 1rem;
            text-align: center;
        }

        .login-subtitle {
            color: #666;
            text-align: center;
            margin-bottom: 2rem;
            font-size: 1.1rem;
        }

        /* Formulario */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--text-color);
        }

        .form-control {
            width: 100%;
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

        .submit-btn {
            background-color: var(--primary-color);
            color: var(--light-text);
            border: none;
            padding: 1rem;
            width: 100%;
            border-radius: 8px;
            font-weight: 500;
            font-size: 1.1rem;
            cursor: pointer;
            transition: var(--transition);
            margin-top: 1rem;
        }

        .submit-btn:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        /* Mensajes de error */
        .error-messages {
            background-color: #f8d7da;
            color: #721c24;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            border: 1px solid #f5c6cb;
            animation: fadeIn 0.5s ease-out;
        }

        .error-messages ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .error-messages li {
            margin-bottom: 0.5rem;
        }

        .error-messages li:last-child {
            margin-bottom: 0;
        }

        /* Enlace de registro */
        .register-link {
            text-align: center;
            margin-top: 1.5rem;
            color: #666;
        }

        .register-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        /* Footer */
        .footer {
            background-color: var(--primary-color);
            color: var(--light-text);
            text-align: center;
            padding: 1.5rem;
            animation: fadeInUp 0.8s ease-out;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .login-container {
                flex-direction: column;
            }
            
            .left-section, .right-section {
                width: 100%;
                padding: 2rem 1rem;
            }
            
            .left-section {
                padding-top: 4rem;
            }
            
            .login-box {
                padding: 2rem;
            }
        }

        @media (max-width: 576px) {
            .login-box {
                padding: 1.5rem;
            }
            
            .login-title {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Sección izquierda con información -->
        <div class="left-section">
            <div class="logo" onclick="window.location.href = '/'">
                <i class="fas fa-project-diagram"></i>
                Projects-JMC
            </div>
            <div class="welcome-text">
                Bienvenido de vuelta a nuestra plataforma
            </div>
            <div class="features-list">
                <div class="feature-item">
                    <i class="fas fa-check-circle feature-icon"></i>
                    <span>Accede a tus proyectos y tareas</span>
                </div>
                <div class="feature-item">
                    <i class="fas fa-check-circle feature-icon"></i>
                    <span>Colabora con tu equipo</span>
                </div>
                <div class="feature-item">
                    <i class="fas fa-check-circle feature-icon"></i>
                    <span>Revisa el progreso de tus actividades</span>
                </div>
            </div>
        </div>

        <!-- Sección derecha con formulario -->
        <div class="right-section">
            <div class="login-box animated" data-animation="fadeInUp">
                <h1 class="login-title">Iniciar Sesión</h1>
                <p class="login-subtitle">Accede a tu cuenta para gestionar tus proyectos y tareas.</p>

                <!-- Mensajes de error -->
                @if ($errors->any())
                    <div class="error-messages">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="/login" method="POST" id="loginForm">
                    @csrf
                    
                    <div class="form-group">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="tu@email.com" value="{{ old('email') }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Ingresa tu contraseña" required>
                    </div>
                    
                    <button type="submit" class="submit-btn">Acceder</button>
                </form>
                
                <div class="register-link">
                    ¿No tienes una cuenta? <a href="/register">Regístrate aquí</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 Projects-JMC. Todos los derechos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Validación básica del formulario
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById("loginForm");
            const errorMessages = document.querySelector(".error-messages");

            // Animación al hacer scroll
            function animateOnScroll() {
                const elements = document.querySelectorAll('.animated');
                const windowHeight = window.innerHeight;
                
                elements.forEach(element => {
                    const elementPosition = element.getBoundingClientRect().top;
                    const animation = element.dataset.animation || 'fadeIn';
                    
                    if(elementPosition < windowHeight - 100) {
                        element.style.animation = `${animation} 0.8s ease-out forwards`;
                    }
                });
            }
            
            // Ejecutar al cargar
            animateOnScroll();
            
            // Validación básica
            form.addEventListener("submit", function(event) {
                const email = document.getElementById("email");
                const password = document.getElementById("password");
                let errors = [];
                
                // Limpiar errores anteriores
                errorMessages.innerHTML = "";
                errorMessages.style.display = "none";

                // Validación de correo electrónico
                const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                if (!emailPattern.test(email.value)) {
                    errors.push("Por favor, ingresa un correo electrónico válido.");
                }

                // Validación de contraseña
                if (password.value.length === 0) {
                    errors.push("La contraseña es obligatoria.");
                }

                // Mostrar errores si existen
                if (errors.length > 0) {
                    event.preventDefault();
                    errorMessages.style.display = "block";
                    const errorsList = document.createElement("ul");
                    
                    errors.forEach(error => {
                        const li = document.createElement("li");
                        li.textContent = error;
                        errorsList.appendChild(li);
                    });
                    
                    errorMessages.innerHTML = "";
                    errorMessages.appendChild(errorsList);
                }
            });
        });
    </script>
</body>
</html>