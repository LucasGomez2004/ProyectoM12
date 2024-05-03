@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <br>
@stop

@section('content')
<?php
    $usersCount = App\Models\User::count();
    $reservationsCount = App\Models\Reservation::count();

    use App\Models\Reservation;
    $latestReservations = Reservation::orderBy('created_at', 'desc')->take(10)->get();
?>

<div class="card card-widget widget-user">
    <div class="widget-user-header text-white" style="background: url('https://images.unsplash.com/photo-1571622390267-a277517fe908?q=80&w=1074&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') center left; background-size:cover;">
        <h3 class="widget-user-username"><b>{{Auth::user()->name}}</b></h3>
        <h5 class="widget-user-desc">@isset(Auth::user()->role) {{ Auth::user()->role->nom() }} @endisset</h5>
    </div>
    <div class="widget-user-image">
        <img class="img-circle" src="{{Auth::user()->avatar}}" alt="User Avatar">
    </div>
    <div class="card-footer ">
        <div class="row">
            <div class="col-lg-6 col-6">
                <div class="small-box bg-dark">
                    <div class="inner">
                        <h3>{{ $usersCount }}</h3>
                        <p>Usuarios</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-fw fa-users"></i>
                    </div>
                    <a href="{{ route('user.list') }}" class="small-box-footer">
                        Saber Más <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-6 col-6">
                <div class="small-box bg-success" >
                    <div class="inner">
                        <h3>{{ $reservationsCount }}</h3>
                        <p>Reservas</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <a href="{{ route('reservation.list') }}" class="small-box-footer">
                        Saber Más <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header border-transparent">
        <h3 class="card-title">Últimas reservas</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Fecha de Inicio</th>
                            <th>Fecha de Fin</th>
                            <th>Usuario</th>
                            <th>Servicio</th>
                            <th>Ubicación</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($latestReservations as $reservation)
                        <tr>
                            <td class="text-success">{{ $reservation->start_date }}</td>
                            <td class="text-danger">{{ $reservation->end_date }}</td>
                            <td>{{ $reservation->user->name }}</td>
                            <td>{{ $reservation->service->name }}</td>
                            <td>{{ $reservation->location->name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="clearfix d-flex justify-content-center">
        <a href="{{ route('calendar.calendar') }}" class="btn btn-app bg-gradient-primary btn-lg w-100">
            <i class="fas fa-calendar"></i> Ver Calendario
        </a>
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
