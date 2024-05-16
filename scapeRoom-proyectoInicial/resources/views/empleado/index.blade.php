@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
{{ Breadcrumbs::render('home') }}
@stop

@section('content')
<div class="card card-widget widget-user">
    <div class="widget-user-header text-white" style="background: url('https://images.unsplash.com/photo-1446104838475-bc6508184f08?q=80&w=2076&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') center center; background-size:cover;">
        <h3 class="widget-user-username"><b>{{Auth::user()->name}}</b></h3>
        <h5 class="widget-user-desc">@isset(Auth::user()->role) {{ Auth::user()->role->nom() }} @endisset</h5>
    </div>
    <div class="widget-user-image">
    @if(Auth::check() && Auth::user()->avatar)
            <img class="img-circle" src="{{ Auth::user()->avatar }}" alt="User Avatar">
        @else
            <img class="img-circle" src="{{ asset('images/6596121.png') }}" alt="Default Avatar" style="background-color:white;">
        @endif
    </div>
    <div class="card-footer ">
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
    
@stop
