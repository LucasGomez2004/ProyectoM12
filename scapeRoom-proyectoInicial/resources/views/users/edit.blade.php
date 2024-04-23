@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <br>
@stop

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar Usuario</h1>
         
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger">Detalles del Usuario</h6>
        </div>
        <div class="card-body">
            <div>
                <div>
                    <form method="POST" action="{{ route('user.edit', ['id' => $user->id])}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-lg-6 mb-3 mb-sm-0">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}"/>
                            </div>
                            <div class="col-lg-6 mb-3 mb-sm-0">            
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" value="{{ $user->email }}"/>
                            </div>
                            <div class="col-lg-6 mb-3 mb-sm-0">            
                                <label for="password">Contrasenya</label>
                                <input type="text" class="form-control" name="password" value="{{ $user->password }}"/>
                            </div>
                            <div class="col-lg-6 mb-3 mb-sm-0">            
                            <label for="role_id">Roles</label>
                        <select class="form-control" name="role_id">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                            @endforeach
                        </select>
                            </div>
                            <div>
                                @if ($user->imatge)
                                <label>Imatge actual: <strong>{{ $user->avatar }}</strong></label>
                                @endif            
                                <br>
                                <label for="avatar">Imagen de Perfil</label>
                                <input type="file" name="avatar"/>
                                <br>
                                <input type="checkbox" name="eliminarimatge">Eliminar la imagen</input>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger btn-user btn-block">
                            Editar
                        </button>
                    </form>
                </div>
            </div>
            <br>
            <a href="{{ route('user.list') }}" class="btn btn-dark float-right">&laquo; Volver a la lista de Usuarios</a>
        </div>
    </div>
</div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
