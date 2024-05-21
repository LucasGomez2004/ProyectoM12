@extends('adminlte::page')

@section('title', 'Crear reserva')

@section('content_header')
{{ Breadcrumbs::render('reservation-client') }}
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm">
                <div class="card-header bg-danger text-white">Reserva</div>

                <div class="card-body">
                    <form id="formulario" method="POST" action="{{ route('client.reserva') }}">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="location" class="form-label">Ubicación:</label>
                            <select id="location" class="form-control" name="location_id">
                                <option value="">Selecciona una ubicación</option>
                                @foreach ($locations as $location)
                                <option value="{{ $location->id }}" {{ $selectedLocation == $location->name ? 'selected' : '' }}>{{ $location->name }}</option>
                                @endforeach
                            </select>
                            @error('location_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="service" class="form-label">Servicio:</label>
                            <select id="service" class="form-control" name="service_id">
                                <option value="">Selecciona un servicio</option>
                                @foreach ($services as $service)
                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                            </select>
                            @error('service_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="participants" class="form-label">Número de Participantes:</label>
                            <select id="participants" class="form-control" name="participants">
                                <option value="">Selecciona el número de participantes</option>
                                @for ($i = 2; $i <= 6; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            @error('participants')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="date" class="form-label">Selecciona una fecha:</label>
                            <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" required>
                            @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="selected_hour" class="form-label">Selecciona una hora:</label>
                            <input id="selected_hour" type="hidden" name="selected_hour" value="">
                            <div id="available-hours" class="d-flex flex-wrap">
                                <!-- Los botones se agregarán dinámicamente aquí -->
                            </div>
                            @error('selected_hour')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group text-center">
                            <button type="button" class="btn btn-primary btn-block" onclick="confirmReserva()" id="submit-button" disabled>
                                Reservar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer')
<strong>&copy; {{ date('Y') }} <a href="">&nbsp;Escape Or Die</a></strong>
<div class="float-right d-none d-sm-inline">
    <strong>
        <a href="{{ route('client.privacidad') }}">Política de privacidad</a>
    </strong>
</div>
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/welcome.js') }}"></script>
<script>
    $(document).ready(function () {
        //Codigo para poner disable los dias que ya han pasado
        var today = new Date().toISOString().split('T')[0];
        $('#date').attr('min', today);

        // Función para cargar las horas disponibles
        function loadAvailableHours() {
            var selectedDate = $('#date').val();
            var locationId = $('#location').val();
            var serviceId = $('#service').val();

            // Obtener el día de la semana
            var selectedDay = new Date(selectedDate).getDay();

            // Verificar si es domingo == 0)
            if (selectedDay === 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Los Domingos no estamos Abiertos!!!.'
                });
                $('#date').val('');
                return;
            }

            if (selectedDate && locationId) {
                $.ajax({
                    url: "{{ route('getAvailableHours') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        selected_date: selectedDate,
                        location_id: locationId,
                        service_id: serviceId
                    },
                    success: function (response) {
                        $('#available-hours').html('');

                        if (response.available_hours.length > 0) {
                            response.available_hours.forEach(function (hour) {
                                var formattedHour = hour.start + ' - ' + hour.end;
                                var button = $('<button style="margin: 5px; padding: 10px;" type="button" class="btn btn-success btn-responsive">' + formattedHour + '</button>');
                                button.click(function () {
                                    $('#selected_hour').val(hour.start);
                                    $('#submit-button').prop('disabled', false);
                                });
                                $('#available-hours').append(button);
                            });
                        } else {
                            $('#available-hours').html('<div>No hay horas disponibles para esta fecha y ubicación</div>');
                        }
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }
        }


        $('#date').change(function () {
            loadAvailableHours();
        });

        $('#location').change(function () {
            loadAvailableHours();
        });
    });
</script>

<style>
    .btn-responsive {
        flex: 1 1 100px;
        margin: 5px;
        padding: 10px;
        min-width: 100px; 
    }
</style>
@endsection
