<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            width:100%;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }

        table ,th,td {
            border:1px solid #dc3545;
            border-collapse:collapse;
        }
        
    </style>
</head>
<body>
<img src="images/logo.webp" alt="" style="width:100px"><div><h1 style="margin-left: 41%;">Usuarios</h1></div>
<br>

    <table>
        <thead style="background-color: #dc3545; color:white;">
            <tr class="bg-danger">
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->nom()}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
