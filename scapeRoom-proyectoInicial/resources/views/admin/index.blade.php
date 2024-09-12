@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class='text-center'><b>ESCAPE OR DIE</b></h1>
@stop

@section('content')
    <h5 class="text-center">¡Bienvenido!&nbsp<b>{{Auth::user()->name}}</b></h5>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
