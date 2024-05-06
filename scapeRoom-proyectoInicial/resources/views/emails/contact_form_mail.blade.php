<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Mensaje</title>
</head>
<body>
    <p>Nombre: {{ $mensaje['nombre'] }}</p>
    <p>Apellidos: {{ $mensaje['apellidos'] }}</p>
    <p>Correo Electrónico: {{ $mensaje['email'] }}</p>
    <p>Teléfono: {{ $mensaje['telefono'] }}</p>
    <p>Mensaje: {{ $mensaje['mensaje'] }}</p>
</body>
</html>
