<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 100%;
            overflow-x: auto;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            width: 100px;
        }

        .header h1 {
            margin: 0;
            color: #dc3545;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto; /* Para centrar la tabla horizontalmente */
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
        }

        th {
            background-color: #dc3545;
            color: white;
        }

        td input[type=password] {
            width: 65px;
            box-sizing: border-box;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f8f8f8;
            font-size: 14px;
            color: #555;
        }

        td img.avatar {
            width: 50px;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="images/logo.webp" alt="Logo">
            <h1>Reservas</h1>
        </div>
        @foreach ($locations as $location)
        <h2>{{$location->nom()}}</h2>
        @if ($location->reservations->isEmpty())
            <p>NO HAY RESERVAS EN ESTA LOCALIDAD</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Inicio</th>
                        <th>Final</th>
                        <th>Participantes</th>
                        <th>Servicios</th>
                        <th>Localidad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $reservation)
                        @if ($reservation->location_id == $location->id)
                        <tr>
                            <td>@isset($reservation->user) {{ $reservation->user->nom() }} @endisset</td>
                            <td>{{$reservation->start_date}}</td>
                            <td>{{$reservation->end_date}}</td>
                            <td>
                                @if ($reservation->participants == 0)
                                    Mantenimiento
                                @else
                                    {{$reservation->participants}}
                                @endif
                            </td>
                            <td>@isset($reservation->service) {{ $reservation->service->nom() }} @endisset</td>
                            <td>@isset($reservation->location) {{ $reservation->location->nom() }} @endisset</td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        @endif
        @endforeach
    </div>
</body>
</html>
