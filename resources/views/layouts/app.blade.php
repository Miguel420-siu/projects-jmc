{{-- filepath: c:\Users\pc\Downloads\projectsj\resources\views\layouts\app.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestor de Tareas')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5dc; /* Beige */
            color: #333; /* Texto oscuro */
            font-family: 'Arial', sans-serif;
        }
        .navbar {
            background-color: #d2b48c; /* Tan */
        }
        .navbar-brand {
            font-weight: bold;
            color: #fff !important;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: #d2b48c;
            border-color: #d2b48c;
        }
        .btn-primary:hover {
            background-color: #c2a17e;
            border-color: #c2a17e;
        }
        .table thead {
            background-color: #d2b48c;
            color: #fff;
        }
        .badge {
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('tareas.index') }}">Projects-JMC</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>