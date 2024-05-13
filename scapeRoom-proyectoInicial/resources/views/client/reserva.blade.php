@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
{{ Breadcrumbs::render('reservation-client') }}
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

                    {{-- Usuario --}}
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label><span style="color:red;">*</span>Usuario</label>
                        <select name="user_id" class="form-control @error('user_id') is-invalid @enderror">
                            <option value="">-- Selecciona un usuario --</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    {{-- start_date --}}
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label><span style="color:red;">*</span>Fecha de inicio</label>
                        <input type="datetime-local" 
                            class="form-control form-control-user @error('start_date') is-invalid @enderror" 
                            id="start_date"
                            name="start_date" 
                            value="{{ old('start_date') }}">

                    </div>

                    {{-- end_date --}}
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label><span style="color:red;">*</span>Fecha de final</label>
                        <input type="datetime-local" 
                            class="form-control form-control-user @error('end_date') is-invalid @enderror" 
                            id="end_date"
                            name="end_date" 
                            value="{{ old('end_date') }}">
                    </div>
                    
                    {{-- service_id --}}
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label><span style="color:red;">*</span>Servicios</label>
                        <select name="service_id" class="form-control @error('role_id') is-invalid @enderror">
                            <option value="">-- Selecciona un Servicio --</option>
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}"  {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                    {{ $service->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                
                    {{-- location_id --}}
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label><span style="color:red;">*</span>Localidad</label>
                        <select name="location_id" class="form-control @error('location_id') is-invalid @enderror">
                            <option value="">-- Selecciona una Localidad --</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}" {{ old('location_id') == $location->id ? 'selected' : '' }}>
                                    {{ $location->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- participants --}}
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label><span style="color:red;">*</span>Número de participantes</label>
                        <select name="participants" class="form-control @error('participants') is-invalid @enderror">
                            <option value="">-- Selecciona un número de participantes --</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="0">-- Escoger, en caso, de limpieza --</option>
                        </select>
                    </div>

                </div>
                {{-- Save Button --}}
                <button type="submit" class="btn btn-danger btn-user btn-block">
                    Crear
                </button>
                <br>
                <a href="{{ route('calendar.calendar') }}" class="btn btn-dark float-right">&laquo; Volver a la lista de Reservas</a>

            </form>
        </div>
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var start_date = document.getElementById('start_date');
        var end_date = document.getElementById('end_date');

        function roundMinutesToNearest30(date) {
            var minutes = date.getMinutes();
            var roundedMinutes = minutes < 30 ? 0 : 30; 
            date.setMinutes(roundedMinutes);
            return date;
        }

        function convertToBrowserTimezone(date) {
            var offset = date.getTimezoneOffset();
            var newDate = new Date(date.getTime() - (offset * 60 * 1000));
            return newDate;
        }

        [start_date, end_date].forEach(function (input) {
            input.addEventListener('input', function () {
                var selectedDate = new Date(input.value);
                var browserTimezoneDate = convertToBrowserTimezone(selectedDate);
                var roundedDate = roundMinutesToNearest30(browserTimezoneDate);
                input.value = roundedDate.toISOString().slice(0, 16);
            });
        });
    });
</script>

@stop



@section('footer')
    <strong>Copyright &copy; {{ date('Y') }} <a href="">&nbsp Escape Or Die</a></strong>
    <div class="float-right d-none d-sm-inline">
        <strong>
            <a href="{{ route('client.privacidad') }}">Política de privacidad</a> 
        </strong>
    </div>
@stop
