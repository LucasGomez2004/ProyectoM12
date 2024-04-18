@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class='text-center'><b>Users</b></h1>
@stop

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">ESCAPE ROOM</h1>
        <a href="{{route('escaperoom.new')}}" class="btn btn-sm btn-primary" >
            <i class="fas fa-plus"></i> Add New
        </a> 
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Users</h6>
            
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <a href="{{ route('escaperoom.list') }}">&laquo; Torna</a>
                <div style="margin-top: 20px">
                    <form method="POST" action="{{ route('escaperoom.edit', ['id' => $escaperoom->id])}}">
                        @csrf
                        <div>
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{ $escaperoom->name }}"/>
                        </div>
                        <div>
                            <label for="location_id">Location</label>
                            <select name="location_id">
                            <option value="">-- selecciona un location --</option>
                                @foreach ($locations as $location)
                                    <option value="{{ $location->id }}" @if ($location->id == $escaperoom->location_id) selected @endif>{{ $location->nom() }}</option>
                                @endforeach
                            </select>
                        <div>
                        <button type="submit">Modificat Escape Room</button>
                    </form>
                </div>
            </div>
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
