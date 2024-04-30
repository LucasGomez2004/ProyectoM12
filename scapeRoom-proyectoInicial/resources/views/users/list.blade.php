@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<br>
@stop

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Usuarios</h1>
    </div>
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <div>
                <a href="{{ route('user.new') }}" class="text-danger">    
                    <i class="fas fa-plus"></i> Añadir usuario
                </a>
                &nbsp
                &nbsp
                <a href="{{ route('user.pdf') }}" class="btn btn-danger">    
                    PDF
                </a>
                @if(isset($filterValue))
                    <p>Búsqueda por nombre de usaurio ... <b>{{ $filterValue }}</b></p>
                    {{-- Si necesitas mostrar algún otro detalle de la búsqueda, puedes hacerlo aquí --}}
                    <a href="{{ route('user.list') }}">Limpiar búsqueda</a>
                @endif
            </div>
            
            <div class="ml-auto">
                <form action="{{ route('user.list') }}" method="GET" class="d-flex">
                    <div class="input-group">
                        <input type="text" name="filterValue" placeholder="Buscar por nombre" class="form-control rounded border-danger">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-danger ">Buscar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="card-body">
            @if (session('status'))
                <div id="status-message" class="alert" style="background-color: green; color: white; width: 100%; transition: opacity 2s ease;">
                    {{ session('status') }}
                </div>
                <script src="{{ asset('js/welcome.js') }}"></script>
            @endif            
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="bg-danger">
                            <th>Nombre</th>
                            <th>Correo electrónico</th>
                            <th>Contraseña</th>
                            <th>Rol</th>
                            <th>Foto de perfil</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->password}}</td>
                                <td>@isset($user->role) {{ $user->role->nom() }} @endisset</td>
                                <td>
                                    @if($user->google_id)
                                        <img src="{{ $user->avatar }}" class="avatar" alt="Avatar del usuario"  style="width: 100px; border-radius: 50px;">
                                    @elseif ($user->avatar )
                                        <img src="{{ asset('uploads/imatges/' . $user->avatar) }}" class="avatar" alt="Avatar del usuario"  style="width: 100px; border-radius: 50px;">
                                    @else
                                        No tiene imagen
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('user.profile', ['id' => $user->id]) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill text-danger" viewBox="0 0 16 16">
                                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                        </svg>
                                    </a>
                                    &nbsp &nbsp
                                    <a href="{{ route('user.edit', ['id' => $user->id]) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square text-danger" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/> 
                                        </svg> 
                                    </a>
                                    &nbsp &nbsp
                                    <a href="{{ route('user.delete', ['id' => $user->id]) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill text-danger" viewBox="0 0 16 16">
                                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-3">
    {{ $users->links() }}
    </div>
        </div>
    </div>
    
</div>
@stop
