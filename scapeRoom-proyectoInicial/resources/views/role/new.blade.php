@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <br>
@stop

@section('content')
<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Añadir Rol</h1> 
    </div>

<div class="card shadow mb-4">
    
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detalles del Rol</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('role.new')}}" enctype="multipart/form-data">
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
                </div>
                {{-- Save Button --}}
                <button type="submit" class="btn btn-success btn-user btn-block">
                    Guardar
                </button>
                <br>
                <a href="{{ route('role.list') }}" class="btn btn-primary float-right">&laquo; Volver a la lista de Servicios</a>

            </form>
        </div>
    </div>

</div>
@stop
