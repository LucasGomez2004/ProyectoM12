@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<br>
@stop

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Reserva</h1>
    </div>
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <div>
            <a href="{{ route('reservation.new') }}" class="text-danger">    
                    <i class="fas fa-plus"></i> Añadir Reserva
                </a>
            </div>
            <div class="ml-auto">
                <form action="{{ route('reservation.list') }}" method="GET" class="d-flex">
                    <div class="input-group">
                        <input type="text" name="filterValue" placeholder="Buscar por nombre" class="form-control rounded border-danger text-danger">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-danger ">Buscar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="card-body">
            @if (session('status'))
                <div id="status-message" class="alert" style="background-color: green; color: white; width: 100%; transition: opacity 2s ease;">
                    {{ session('status') }}
                </div>
                <script src="{{ asset('js/welcome.js') }}"></script>
            @endif            
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="bg-danger">
                            <th>Usuario</th>
                            <th>Fecha de inicio</th>
                            <th>Fecha de final</th>
                            <th>Servicio</th>
                            <th>Localidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservation as $reserva)
                            <tr>
                                <td>@isset($reserva->user) {{ $reserva->user->nom() }} @endisset</td>
                                <td>{{$reserva->start_date}}</td>
                                <td>{{$reserva->end_date}}</td>
                                <td>@isset($reserva->location) {{ $reserva->location->nom() }} @endisset</td>
                                <td>@isset($reserva->service) {{ $reserva->service->nom() }} @endisset</td>
                                <td>@isset($user->role) {{ $user->role->nom() }} @endisset</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>
@stop
