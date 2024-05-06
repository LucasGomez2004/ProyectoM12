@extends('adminlte::page')

@section('title', 'User Profile')

@section('content_header')
{{ Breadcrumbs::render('user-profile') }}
@stop

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger">Detalles del usuario</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Foto de perfil</label><br>
                                    @if($user->google_id)
                                        <img src="{{ $user->avatar }}" class="avatar" alt="Avatar del usuario"  style="width: 100px; border-radius: 50px;">
                                    @elseif ($user->avatar )
                                        <img src="{{ asset('uploads/imatges/' . $user->avatar) }}" class="avatar" alt="Avatar del usuario"  style="width: 100px; border-radius: 50px;">
                                    @else
                                        No tiene imagen
                                    @endif
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <label>Nombre:</label>
                        <p>{{ $user->name }}</p>
                    </div>
                    <div class="form-group">
                        <label>Correo electrónico:</label>
                        <p>{{ $user->email }}</p>
                    </div>
                    <div class="form-group">
                        <label>Contraseña:</label>
                        <p>{{ $user->password }}</p>
                    </div>
                    <div class="form-group">
                        <label>Rol:</label>
                        <p>@isset($user->role) {{ $user->role->nom() }} @endisset</p>
                    </div>
                </div>
            </div>
            <a href="{{ route('user.list') }}" class="btn btn-danger float-right">&laquo; Volver a la lista de usuarios</a>
        </div>
    </div>
</div>
@stop
