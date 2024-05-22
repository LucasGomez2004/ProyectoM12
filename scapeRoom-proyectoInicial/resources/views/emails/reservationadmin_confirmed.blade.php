<!DOCTYPE html>
<html>
<head>
    <title>Reserva Confirmada</title>
</head>
<body>
    <h1>¡Tu reserva ha sido confirmada!</h1>
    <p>Hola, {{ $reservation->user->name }}</p>
    <p>Reservado en la ubicación: {{ $reservation->location->name }}</p>
    <p>Servicio: {{ $reservation->service->name }}</p>
    <p>Fecha y Hora de Inicio: {{ \Carbon\Carbon::parse($reservation->start_date)->format('Y-m-d H:i') }}</p>
    <p>Fecha y Hora de Fin: {{ \Carbon\Carbon::parse($reservation->end_date)->format('Y-m-d H:i') }}</p>
    <p>Participantes: {{ $reservation->participants }}</p>
    <p>¡Gracias por reservar con nosotros!</p>
</body>
</html>
