@extends('adminlte::page')

@section('title', 'Editar Escape Room')

@section('content_header')
{{ Breadcrumbs::render('escaperoom-edit') }}
@stop

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar Escape Room</h1> 
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger">Detalles del Escape Room</h6>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card-body">
            <div>
                <div>
                    <form method="POST" action="{{ route('escaperoom.edit', ['id' => $escaperoom->id])}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-lg-6 mb-3 mb-sm-0">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" name="name" value="{{ $escaperoom->name }}"/>
                            </div>
                            <div class="col-lg-6 mb-3 mb-sm-0">            
                            <label for="location_id">Localidad</label>
                        <select class="form-control" name="location_id">
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}" {{ $escaperoom->location_id == $location->id ? 'selected' : '' }}>{{ $location->name }}</option>
                            @endforeach
                        </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger btn-user btn-block">
                            Editar Escape Room
                        </button>
                    </form>
                </div>
            </div>
            <br>
            <a href="{{ route('escaperoom.list') }}" class="btn btn-dark float-right">&laquo; Volver a la lista de Escape Rooms</a>
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
