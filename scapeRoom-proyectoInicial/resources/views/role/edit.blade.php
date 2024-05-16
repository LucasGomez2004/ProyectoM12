@extends('adminlte::page')

@section('title', 'Editar Rol')

@section('content_header')
{{ Breadcrumbs::render('role-edit') }}
@stop

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar Rol</h1> 
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger">Detalles del Rol</h6>
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
                    <form method="POST" action="{{ route('role.edit', ['id' => $role->id])}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-lg-6 mb-3 mb-sm-0">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" name="name" value="{{ $role->name }}"/>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger btn-user btn-block">
                            Editar Rol
                        </button>
                    </form>
                </div>
            </div>
            <br>
            <a href="{{ route('role.list') }}" class="btn btn-dark float-right">&laquo; Volver a la lista de Roles</a>
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
