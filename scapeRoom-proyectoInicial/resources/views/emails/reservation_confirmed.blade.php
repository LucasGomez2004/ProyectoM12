<!DOCTYPE html>
<html>
<head>
    <title>Reserva Confirmada</title>
</head>
<body>
    <h1>¡Tu reserva ha sido confirmada!</h1>
    <p>Hola, {{ $reservation->user->name }}</p>
    <p>Has reservado en la ubicación: {{ $reservation->location->name }}</p>
    <p>Servicio: {{ $reservation->service->name }}</p>
    <p>Fecha y Hora de Inicio: {{ $reservation->start_date }}</p>
    <p>Fecha y Hora de Fin: {{ $reservation->end_date }}</p>
    <p>Participantes: {{ $reservation->participants }}</p>
    <p>¡Gracias por reservar con nosotros!</p>
</body>
</html>
