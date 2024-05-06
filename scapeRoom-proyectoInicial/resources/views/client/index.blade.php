@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <br>
@stop

@section('content')
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
