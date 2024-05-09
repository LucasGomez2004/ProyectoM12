@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
{{ Breadcrumbs::render('reservation-client') }}
@stop

@section('content')

@stop


@section('footer')
    <strong>Copyright &copy; {{ date('Y') }} <a href="">&nbsp Escape Or Die</a></strong>
    <div class="float-right d-none d-sm-inline">
        <strong>
            <a href="{{ route('client.privacidad') }}">Política de privacidad</a> 
        </strong>
    </div>
@stop
