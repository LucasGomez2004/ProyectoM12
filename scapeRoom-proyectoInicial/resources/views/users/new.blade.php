@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <br>
@stop

@section('content')
<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Usuarios</h1>
    </div>
<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger"> Crear Usuario</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('user.new')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    {{-- Name --}}
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <span style="color:red;">*</span>Nombre</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('name') is-invalid @enderror" 
                            id="exampleName"
                            placeholder="Nombre" 
                            name="name" 
                            value="{{ old('name') }}">

                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    {{-- Email --}}
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <span style="color:red;">*</span>Email</label>
                        <input type="text" 
                            class="form-control form-control-user @error('email') is-invalid @enderror" 
                            id="exampleEmail"
                            placeholder="Email" 
                            name="email" 
                            value="{{ old('email') }}">

                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <span style="color:red;">*</span>Contrasenya</label>
                        <input type="text" 
                            class="form-control form-control-user @error('password') is-invalid @enderror" 
                            id="examplePassword"
                            placeholder="Contrasenya" 
                            name="password" 
                            value="{{ old('password') }}">

                        @error('password')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    
                    {{-- Avatar --}}
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <span style="color:red;">*</span>Imagen</label>
                        <input type="file" 
                            class="form-control form-control-user @error('avatar') is-invalid @enderror" 
                            id="exampleAvatar"
                            placeholder="Imagen" 
                            name="avatar" 
                            value="{{ old('avatar') }}">

                        @error('avatar')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                
                    {{-- rol --}}
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <span style="color:red;">*</span>Rol</label>
                        <select name="role_id" class="form-control @error('role_id') is-invalid @enderror">
                            <option value="">-- Selecciona un Rol --</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('role_id')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                </div>
                {{-- Save Button --}}
                <button type="submit" class="btn btn-danger btn-user btn-block">
                    Crear
                </button>
                <br>
                <a href="{{ route('user.list') }}" class="btn btn-dark float-right">&laquo; Volver a la lista de Usuarios</a>

            </form>
        </div>
    </div>

</div>
@stop
