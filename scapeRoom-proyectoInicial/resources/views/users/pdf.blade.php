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
            margin: 0 auto;
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
            <h1>Usuarios</h1>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo electrónico</th>
                    <th>Rol</th>
                    <th>Avatar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>@isset($user->role) {{ $user->role->nom() }} @endisset</td>
                    <td>
                        @if($user->google_id)
                        <img src="{{ $user->avatar }}" class="avatar" alt="Avatar del usuario">
                        @elseif ($user->avatar )
                        <img src="{{ asset('uploads/imatges/' . $user->avatar) }}" class="avatar" alt="Avatar del usuario">
                        @else
                        <p>Sin imagen de perfil</p>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
