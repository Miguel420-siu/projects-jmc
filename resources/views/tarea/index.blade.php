<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Tarea</title>
</head>
<body>
    <h1>Crear Nueva Tarea</h1>
    <form action="{{ url('/tarea') }}" method="post">
    @csrf
    <div>
        <label for="titulo">Titulo de la Tarea:</label>
        <input type="text" id="titulo" name="titulo" required>
    </div>
    <div>
        <label for="descripcion">Descripción:</label>
        <input type="text" id="descripcion" name="descripcion" required>
    </div>
    <div>
        <label for="fecha_limite">Fecha Limite:</label>
        <input type="date" id="fecha_limite" name="fecha_limite" required>
    </div>
    <div>
        <label for="prioridad">Prioridad:</label>
        <select id="prioridad" name="prioridad" required>
            <option value="baja">Baja</option>
            <option value="medio">Media</option>
            <option value="alta">Alta</option>
        </select>
    </div>
    <div>
        <label for="estado">Estado:</label>
        <select id="estado" name="estado" required>
            <option value="sin_empezar">Sin empezar</option>
            <option value="en_proceso">En proceso</option>
            <option value="terminada">Terminada</option>
        </select>
    </div>
    <button type="submit">Enviar</button>
</form>
</body>
</html>