@extends('adminlte::page')

@section('title', 'Mis reservas')

@section('content_header')
{{ Breadcrumbs::render('user-reservation') }}
@stop

@section('content')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-column flex-sm-row justify-content-between align-items-center">
    <div class="mb-2 mb-sm-0">
        <span class="text-danger">Mis Reservas</span>
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
                            <th>Inicio</th>
                            <th>Fin</th>
                            <th>Localidad</th>
                            <th>Servicio</th>
                            <th>Participantes</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $reserva)
                            <tr>
                                <td>@isset($reserva->user) {{ $reserva->user->nom() }} @endisset</td>
                                <td>{{$reserva->start_date}}</td>
                                <td>{{$reserva->end_date}}</td>
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
                                    <a onclick="return confirmDeleteReservation('{{ route('client.reservation-delete', ['id' => $reserva->id]) }}');" class="btn btn-danger">Cancelar</a>
                                </td>                            
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-3">
                {{ $reservations->links() }}
            </div>
        </div>
    </div>
    
</div>
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/welcome.js') }}"></script>
@stop




@section('footer')
    <strong>Copyright &copy; {{ date('Y') }} <a href="">&nbsp Escape Or Die</a></strong>
    <div class="float-right d-none d-sm-inline">
        <strong>
            <a href="{{ route('client.privacidad') }}">Política de privacidad</a> 
        </strong>
    </div>
@stop
