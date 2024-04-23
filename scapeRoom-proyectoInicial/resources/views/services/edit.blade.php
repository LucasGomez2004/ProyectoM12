@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<br>
@stop

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar Servicio</h1> 
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger">Detalles del Servicio</h6>
        </div>
        <div class="card-body">
            <div>
                <div>
                    <form method="POST" action="{{ route('service.edit', ['id' => $service->id])}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-lg-6 mb-3 mb-sm-0">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" name="name" value="{{ $service->name }}"/>
                            </div>
                            <div class="col-lg-6 mb-3 mb-sm-0">            
                                <label for="description">Descripción</label>
                                <input type="text" class="form-control" name="description" value="{{ $service->description }}"/>
                            </div>
                            <div class="col-lg-6 mb-3 mb-sm-0">            
                                <label for="price">Precio</label>
                                <input type="text" class="form-control" name="price" value="{{ $service->price }}"/>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger btn-user btn-block">
                            Editar Servicio
                        </button>
                    </form>
                </div>
            </div>
            <br>
            <a href="{{ route('service.list') }}" class="btn btn-dark float-right">&laquo; Volver a la lista de Servicios</a>
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
