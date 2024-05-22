<!DOCTYPE html>
<html>
<head>
    <title>Reserva Cancelada</title>
</head>
<body>
    <h1>Reserva Cancelada</h1>
    <p>Hola, {{ $reservation->user->name }}.</p>
    <p>Tu reserva ha sido cancelada.</p>
    <p>Detalles de la reserva:</p>
    <ul>
        <li>Ubicación: {{ $reservation->location->name }}</li>
        <li>Servicio: {{ $reservation->service->name }}</li>
        <li>Fecha y hora de inicio: {{ $reservation->start_date }}</li>
        <li>Fecha y hora de finalización: {{ $reservation->end_date }}</li>
        <li>Número de participantes: {{ $reservation->participants }}</li>
    </ul>
</body>
</html>
