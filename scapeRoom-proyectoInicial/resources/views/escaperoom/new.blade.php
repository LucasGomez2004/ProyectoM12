@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <br>
@stop

@section('content')
<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Escape Room</h1>
</div>

<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger">Añadir Nuevo Escape Room</h6>
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
            <form method="POST" action="{{route('escaperoom.new')}}" enctype="multipart/form-data">
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
                    </div>

                    {{-- Location --}}
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <span style="color:red;">*</span>Localidad</label>
                        <select name="location_id" class="form-control @error('location_id') is-invalid @enderror">
                            <option value="">-- Selecciona una Localidad --</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}" {{ old('location_id') == $location->id ? 'selected' : '' }}>
                                    {{ $location->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                </div>
                {{-- Save Button --}}
                <button type="submit" class="btn btn-danger btn-user btn-block">
                    Guardar
                </button>
                <br>
                <a href="{{ route('escaperoom.list') }}" class="btn btn-dark float-right">&laquo; Volver a la Lista de Escape Rooms</a>

            </form>
        </div>
    </div>

</div>
@stop
