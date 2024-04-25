@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <br>
@stop

@section('content')
<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Reserva</h1>
    </div>
<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger"> Crear Reserva</h6>
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
            <form method="POST" action="{{route('reservation.new')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">

                    {{-- start_date --}}
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <span style="color:red;">*</span>Start_date</label>
                        <input type="datetime-local" 
                            class="form-control form-control-user @error('start_date') is-invalid @enderror" 
                            id="exampleStart_date"
                            placeholder="Start_date" 
                            name="start_date" 
                            value="{{ old('start_date') }}">

                    </div>

                    {{-- end_date --}}
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <span style="color:red;">*</span>End_date</label>
                        <input type="datetime-local" 
                            class="form-control form-control-user @error('end_date') is-invalid @enderror" 
                            id="exampleEnd_date"
                            placeholder="Contrasenya" 
                            name="end_date" 
                            value="{{ old('end_date') }}">
                    </div>
                    
                    {{-- service_id --}}
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <span style="color:red;">*</span>Service</label>
                        <select name="service_id" class="form-control @error('role_id') is-invalid @enderror">
                            <option value="">-- Selecciona un Service --</option>
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}"  {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                    {{ $service->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                
                    {{-- location_id --}}
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
                    Crear
                </button>
                <br>
                <a href="{{ route('user.list') }}" class="btn btn-dark float-right">&laquo; Volver a la lista de Usuarios</a>

            </form>
        </div>
    </div>

</div>
@stop
