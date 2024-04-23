@extends('adminlte::page')

@section('title', 'User Profile')

@section('content_header')
    <h1 class="text-center"><b>User Profile</b></h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger">User Details</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Avatar</label><br>
                        <img src="{{ asset('uploads/imatges/'. $user->avatar) }}" alt="Imatge del client" style="width: 400px; height: auto;" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <label>Name:</label>
                        <p>{{ $user->name }}</p>
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <p>{{ $user->email }}</p>
                    </div>
                    <div class="form-group">
                        <label>Password:</label>
                        <p>{{ $user->password }}</p>
                    </div>
                    <div class="form-group">
                        <label>Role:</label>
                        <p>@isset($user->role) {{ $user->role->nom() }} @endisset</p>
                    </div>
                </div>
            </div>
            <a href="{{ route('user.list') }}" class="btn btn-danger float-right">&laquo; Volver a la lista de usuarios</a>
        </div>
    </div>
</div>
@stop
