<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse - Projects-JMC</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.querySelector("form");
            const password = document.querySelector("input[name='password']");
            const passwordConfirmation = document.querySelector("input[name='password_confirmation']");
            const email = document.querySelector("input[name='email']");
            const name = document.querySelector("input[name='name']");
            const errorMessages = document.querySelector(".error-messages");

            form.addEventListener("submit", function(event) {
                // Limpiar errores anteriores
                errorMessages.innerHTML = "";

                // Validación de nombre
                if (name.value.trim() === "") {
                    errorMessages.innerHTML += "<p>El nombre es obligatorio.</p>";
                    event.preventDefault();
                    return;
                }

                // Validación de correo electrónico
                const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                if (!emailPattern.test(email.value)) {
                    errorMessages.innerHTML += "<p>Por favor, ingresa un correo electrónico válido.</p>";
                    event.preventDefault();
                    return;
                }

                // Validación de contraseñas
                if (password.value !== passwordConfirmation.value) {
                    errorMessages.innerHTML += "<p>Las contraseñas no coinciden.</p>";
                    event.preventDefault();
                    return;
                }

                if (password.value.length < 8) {
                    errorMessages.innerHTML += "<p>La contraseña debe tener al menos 8 caracteres.</p>";
                    event.preventDefault();
                    return;
                }
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <div class="left-section">
            <div class="footer-text" onclick="window.location.href = '/'">Projects-JMC</div>
        </div>
        <div class="right-section">
            <div class="contact-box">
                <h2>Registrarse</h2>
                <p>Crea una cuenta para comenzar a gestionar tus proyectos y tareas.</p>

                {{-- Mostrar errores de validación --}}
                <div class="error-messages" style="color: red; font-size: 0.9em; margin-bottom: 15px;">
                    @if ($errors->any())
                        <ul style="list-style: none; padding: 0;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <form action="/register" method="POST">
                    @csrf
                    <input type="text" name="name" placeholder="Nombre" value="{{ old('name') }}" required class="input-field">
                    <input type="email" name="email" placeholder="Correo Electrónico" value="{{ old('email') }}" required class="input-field">
                    <input type="password" name="password" placeholder="Contraseña" required class="input-field">
                    <input type="password" name="password_confirmation" placeholder="Confirmar Contraseña" required class="input-field">
                    <button type="submit" class="submit-btn">Registrarse</button>
                </form>
                <div class="link-text">
                    <p>¿Ya tienes una cuenta? <a href="/login">Inicia sesión aquí</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="footer-content">
            <p>© 2025 Projects-JMC. Todos los derechos reservados.</p>
        </div>
    </div>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            height: 100vh;
            flex-direction: column;
        }

        .container {
            display: flex;
            flex: 1;
            width: 100%;
            justify-content: center;
            align-items: center;
        }

        .left-section {
            background-color: #007bff;
            color: white;
            padding: 40px;
            width: 40%;
            text-align: center;
        }

        .footer-text {
            font-size: 1.5em;
            cursor: pointer;
        }

        .right-section {
            width: 60%;
            padding: 40px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .contact-box h2 {
            margin-bottom: 15px;
            font-size: 2em;
            color: #333;
        }

        .contact-box p {
            font-size: 1.1em;
            margin-bottom: 25px;
            color: #666;
        }

        .input-field {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 1em;
        }

        .input-field:focus {
            border-color: #007bff;
            outline: none;
        }

        .submit-btn {
            background-color: #007bff;
            color: white;
            padding: 12px;
            width: 100%;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.1em;
            transition: background-color 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #0056b3;
        }

        .link-text p {
            text-align: center;
            font-size: 1em;
        }

        .link-text a {
            color: #007bff;
            text-decoration: none;
        }

        .link-text a:hover {
            text-decoration: underline;
        }

        /* Footer styles */
        .footer {
            width: 100%;
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 15px 0;
            position: relative;
            bottom: 0;
        }

        .footer-content p {
            margin: 0;
            font-size: 0.9em;
        }
    </style>
</body>
</html>
