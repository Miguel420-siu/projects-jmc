<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Projects-JMC</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <script>
        function redirectToWelcome() {
            window.location.href = "/";
        }
    </script>
</head>
<body>
    <div class="left-section">
        <div class="footer-text" onclick="redirectToWelcome()">Projects-JMC</div>
    </div>
    <div class="right-section">
        <div class="contact-box">
            <h2>Iniciar Sesión</h2>
            <p style="text-align: center;">Accede a tu cuenta para gestionar tus proyectos y tareas.</p>

            {{-- Mostrar errores de validación --}}
            @if ($errors->any())
                <div class="error-messages">
                    <ul style="list-style: none; padding: 0;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/login" method="POST">
                @csrf
                <input type="email" name="email" placeholder="Correo Electrónico" value="{{ old('email') }}" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <button type="submit">Iniciar Sesión</button>
                <div class="register-link">
                    <p>¿No estás registrado? <a href="/register">Regístrate aquí</a></p>
                </div>
        </div>
    </div>
</body>
</html>
