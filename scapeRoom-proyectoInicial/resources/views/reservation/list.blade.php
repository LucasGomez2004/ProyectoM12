@extends('adminlte::page')

@section('title', 'Reservas')

@section('content_header')
    {{ Breadcrumbs::render('reservation-list') }}
    <script src="js/filtrar.js"></script>
@stop

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Reserva</h1>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-column flex-md-row justify-content-between align-items-center">
            <div class="mb-2 mb-md-0">
                <span class="text-danger">Listado de Reservas &nbsp</span>
                @if(isset($filterValue))
                    <p class="mt-2 mt-md-0 mb-0">Búsqueda por nombre de usuario... <b>{{ $filterValue }}</b></p>
                    <a href="{{ route('reservation.list') }}">Limpiar búsqueda</a>
                @endif
            </div>

            <a href="{{ route('users-reservas.pdf', ['filterValue' => request('filterValue'), 'filterLocalidad' => request('filterLocalidad')]) }}" class="btn btn-danger mr-2">PDF</a>


            <div class="ml-md-auto">
                <form id="filterForm" action="{{ route('reservation.list') }}" method="GET" class="form-inline">
                    <label for="filterLocalidad" class="mr-2">Filtrar por Localidad: </label>
                    <select name="filterLocalidad" id="filterLocalidad" class="form-control mb-2 mb-md-0">
                        <option value="0">Todos</option>
                        @foreach ($locations as $location)
                            <option value="{{ $location->name }}">{{ $location->name }}</option>
                        @endforeach
                    </select>
                </form>
            </div>

            <div class="ml-md-2">
                <form action="{{ route('reservation.list') }}" method="GET" class="form-inline">
                    <div class="input-group">
                        <input type="text" name="filterValue" placeholder="Buscar por usuario" class="form-control">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-danger">Buscar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card-body">
            @if (session('status'))
                <div id="status-message" class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                <script src="{{ asset('js/welcome.js') }}"></script>
            @endif            
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="bg-danger text-white">
                            <th>Usuario</th>
                            <th>Inicio</th>
                            <th>Fin</th>
                            <th>Localidad</th>
                            <th>Servicio</th>
                            <th>Participantes</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservation as $reserva)
                            <tr>
                                <td>@isset($reserva->user) {{ $reserva->user->nom() }} @endisset</td>
                                <td>{{ $reserva->start_date }}</td>
                                <td>{{ $reserva->end_date }}</td>
                                <td>@isset($reserva->location) {{ $reserva->location->nom() }} @endisset</td>
                                <td>@isset($reserva->service) {{ $reserva->service->nom() }} @endisset</td>
                                <td>
                                    @if($reserva->participants == 0)
                                        <span class="text-info"><b>Mantenimiento</b></span>
                                    @else
                                        {{ $reserva->participants }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('reservation.edit', ['id' => $reserva->id]) }}" class="text-danger">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    &nbsp;&nbsp;
                                    <a onclick="confirmDelete('{{ route('reservation.delete', ['id' => $reserva->id]) }}')" style="cursor: pointer;" class="text-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-3">
                {{ $reservation->links() }}
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/welcome.js') }}"></script>
    <script src="{{ asset('js/filtrar.js') }}"></script>
    <script>
        var reservationListUrl = "{{ route('reservation.list') }}";
    </script>
@stop
