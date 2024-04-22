@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<br>
@stop

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar Localidad</h1> 
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detalles del Localidad</h6>
        </div>
        <div class="card-body">
            <div>
                <div>
                    <form method="POST" action="{{ route('location.edit', ['id' => $location->id])}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-lg-6 mb-3 mb-sm-0">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" name="name" value="{{ $location->name }}"/>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success btn-user btn-block">
                            Editar Localidad
                        </button>
                    </form>
                </div>
            </div>
            <br>
            <a href="{{ route('location.list') }}" class="btn btn-primary float-right">&laquo; Volver a la lista de Localidades</a>
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