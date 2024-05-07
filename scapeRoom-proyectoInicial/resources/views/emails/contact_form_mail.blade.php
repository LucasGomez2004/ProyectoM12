<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Mensaje</title>
</head>
<body>
    <p><b>Nombre: </b>{{ $mensaje['nombre'] }}</p>
    <p><b>Apellidos: </b>{{ $mensaje['apellidos'] }}</p>
    <p><b>Correo Electrónico: </b>{{ $mensaje['email'] }}</p>
    <p><b>Teléfono: </b>{{ $mensaje['telefono'] }}</p>
    <p><b>Mensaje: </b>{{ $mensaje['mensaje'] }}</p>
</body>
</html>