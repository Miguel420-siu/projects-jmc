<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse - Projects-JMC</title>
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
        .register-container {
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

        .register-box {
            background: var(--light-text);
            border-radius: 12px;
            padding: 3rem;
            box-shadow: var(--shadow-md);
            width: 100%;
            max-width: 500px;
            transition: var(--transition);
        }

        .register-box:hover {
            box-shadow: var(--shadow-lg);
        }

        .register-title {
            font-size: 2rem;
            color: var(--primary-dark);
            margin-bottom: 1rem;
            text-align: center;
        }

        .register-subtitle {
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

        /* Mensajes de error (sin barra roja) */
        .error-messages {
            color: #dc3545;
            margin-bottom: 1.5rem;
            animation: fadeIn 0.5s ease-out;
        }

        .error-messages ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .error-messages li {
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .error-messages li:last-child {
            margin-bottom: 0;
        }

        /* Enlace de login */
        .login-link {
            text-align: center;
            margin-top: 1.5rem;
            color: #666;
        }

        .login-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }

        .login-link a:hover {
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
            .register-container {
                flex-direction: column;
            }
            
            .left-section, .right-section {
                width: 100%;
                padding: 2rem 1rem;
            }
            
            .left-section {
                padding-top: 4rem;
            }
            
            .register-box {
                padding: 2rem;
            }
        }

        @media (max-width: 576px) {
            .register-box {
                padding: 1.5rem;
            }
            
            .register-title {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <!-- Sección izquierda con información -->
        <div class="left-section">
            <div class="logo" onclick="window.location.href = '/'">
                <i class="fas fa-project-diagram"></i>
                Projects-JMC
            </div>
            <div class="welcome-text">
                Únete a nuestra plataforma y comienza a gestionar tus proyectos
            </div>
            <div class="features-list">
                <div class="feature-item">
                    <i class="fas fa-check-circle feature-icon"></i>
                    <span>Gestión de tareas intuitiva</span>
                </div>
                <div class="feature-item">
                    <i class="fas fa-check-circle feature-icon"></i>
                    <span>Colaboración en equipo</span>
                </div>
                <div class="feature-item">
                    <i class="fas fa-check-circle feature-icon"></i>
                    <span>Seguimiento de progreso</span>
                </div>
            </div>
        </div>

        <!-- Sección derecha con formulario -->
        <div class="right-section">
            <div class="register-box animated" data-animation="fadeInUp">
                <h1 class="register-title">Registrarse</h1>
                <p class="register-subtitle">Crea una cuenta para comenzar a gestionar tus proyectos y tareas.</p>

                <!-- Mensajes de error (sin barra roja) -->
                @if ($errors->any())
                    <div class="error-messages">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="/register" method="POST" id="registerForm">
                    @csrf
                    
                    <div class="form-group">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Tu nombre completo" value="{{ old('name') }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="tu@email.com" value="{{ old('email') }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Mínimo 8 caracteres" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Repite tu contraseña" required>
                    </div>
                    
                    <button type="submit" class="submit-btn">Crear Cuenta</button>
                </form>
                
                <div class="login-link">
                    ¿Ya tienes una cuenta? <a href="/login">Inicia sesión aquí</a>
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
        // Validación del formulario
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById("registerForm");
            const password = document.getElementById("password");
            const passwordConfirmation = document.getElementById("password_confirmation");
            const email = document.getElementById("email");
            const name = document.getElementById("name");
            const errorMessages = document.querySelector(".error-messages");

            form.addEventListener("submit", function(event) {
                let errors = [];
                
                // Limpiar errores anteriores
                errorMessages.innerHTML = "";
                errorMessages.style.display = "none";

                // Validación de nombre
                if (name.value.trim() === "") {
                    errors.push("El nombre es obligatorio.");
                }

                // Validación de correo electrónico
                const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                if (!emailPattern.test(email.value)) {
                    errors.push("Por favor, ingresa un correo electrónico válido.");
                }

                // Validación de contraseñas
                if (password.value !== passwordConfirmation.value) {
                    errors.push("Las contraseñas no coinciden.");
                }

                if (password.value.length < 8) {
                    errors.push("La contraseña debe tener al menos 8 caracteres.");
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
        });
    </script>
</body>
</html>