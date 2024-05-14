@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
{{ Breadcrumbs::render('reservation-client') }}
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Reserva</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('client.reserva') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="location" class="col-md-4 col-form-label text-md-right">Ubicación:</label>

                            <div class="col-md-6">
                                <select id="location" class="form-control" name="location_id">
                                    <option value="">Selecciona una ubicación</option>
                                    @foreach ($locations as $location)
                                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                                    @endforeach
                                </select>

                                @error('location_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="service" class="col-md-4 col-form-label text-md-right">Servicio:</label>

                            <div class="col-md-6">
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
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">Selecciona una fecha:</label>

                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" required>

                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="participants" class="col-md-4 col-form-label text-md-right">Número de Participantes:</label>

                            <div class="col-md-6">
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
                        </div>

                        <div class="form-group row">
                            <label for="selected_hour" class="col-md-4 col-form-label text-md-right">Selecciona una hora:</label>

                            <div class="col-md-6">
                                <!-- Este campo oculto almacenará la hora seleccionada -->
                                <input id="selected_hour" type="hidden" name="selected_hour" value="">
                                
                                <!-- Aquí se mostrarán los botones de las horas disponibles -->
                                <div id="available-hours">
                                    <!-- Los botones se agregarán dinámicamente aquí -->
                                </div>
                                
                                @error('selected_hour')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Reservar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer')
<strong>Copyright &copy; {{ date('Y') }} <a href="">&nbsp Escape Or Die</a></strong>
<div class="float-right d-none d-sm-inline">
    <strong>
        <a href="{{ route('client.privacidad') }}">Política de privacidad</a>
    </strong>
</div>
@stop

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Cuando se seleccione una fecha
        document.getElementById('date').addEventListener('change', function () {
            var selectedDate = this.value;
            var locationId = document.getElementById('location').value;
            var serviceId = document.getElementById('service').value;

            // Realizar una solicitud AJAX para obtener las horas disponibles para esa fecha
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
                    // Limpiar el contenedor de horas disponibles
                    $('#available-hours').html('');

                    // Verificar si hay horas disponibles
                    if (response.available_hours.length > 0) {
                        // Mostrar las horas disponibles
                        response.available_hours.forEach(function (hour) {
                            // Formatear la hora en el formato deseado
                            var formattedHour = hour.start + ' - ' + hour.end;

                            // Crear un botón para la hora disponible y agregarlo al contenedor
                            var button = $('<button type="button" class="btn btn-primary mr-2">' + formattedHour + '</button>');
                            button.click(function() {
                                // Cuando se hace clic en un botón, actualizar el valor del campo oculto
                                $('#selected_hour').val(hour.start);
                            });
                            $('#available-hours').append(button);
                        });
                    } else {
                        $('#available-hours').html('<div>No hay horas disponibles para esta fecha, ubicación y servicio.</div>');
                    }
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>
@endsection
