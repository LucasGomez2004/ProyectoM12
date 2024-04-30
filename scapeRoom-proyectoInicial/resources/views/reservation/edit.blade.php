@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <br>
@stop

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar Reserva</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger">Detalles de la Reserva</h6>
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
                    <form method="POST" action="{{ route('reservation.edit', ['id' => $reservation->id])}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-lg-6 mb-3 mb-sm-0">            
                                <label for="user_id">Usuario</label>
                                    <select class="form-control" name="user_id">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}" {{ $reservation->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="col-lg-6 mb-3 mb-sm-0">
                                <label for="start_date">Fecha de inicio</label>
                                <input type="datetime-local" class="form-control" name="start_date" id="start_date" value="{{ $reservation->start_date }}"/>
                            </div>
                            <div class="col-lg-6 mb-3 mb-sm-0">            
                                <label for="end_date">Fecha de final</label>
                                <input type="datetime-local" class="form-control" name="end_date" id="end_date" value="{{ $reservation->end_date }}"/>
                            </div>
                            <div class="col-lg-6 mb-3 mb-sm-0">            
                                <label for="service_id">Servicio</label>
                                    <select class="form-control" name="service_id">
                                        @foreach ($services as $service)
                                            <option value="{{ $service->id }}" {{ $reservation->service_id == $service->id ? 'selected' : '' }}>{{ $service->name }}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="col-lg-6 mb-3 mb-sm-0">            
                                <label for="location_id">Localidad</label>
                                    <select class="form-control" name="location_id">
                                        @foreach ($locations as $location)
                                            <option value="{{ $location->id }}" {{ $reservation->location_id == $location->id ? 'selected' : '' }}>{{ $location->name }}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger btn-user btn-block">
                            Editar
                        </button>
                    </form>
                </div>
            </div>
            <br>
            <a href="{{ route('reservation.list') }}" class="btn btn-dark float-right">&laquo; Volver a la lista de la Reservas</a>
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