@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<br>
@stop

@section('content')
<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Escape Room</h1>
    </div>
    
    <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <div>
                <a href="{{ route('escaperoom.new') }}" class="text-danger">    
                    <i class="fas fa-plus"></i> Añadir Escape Room
                </a>
                @if(isset($filterValue))
                    <p>Búsqueda por nombre de Escape Room ... <b>{{ $filterValue }}</b></p>
                    {{-- Si necesitas mostrar algún otro detalle de la búsqueda, puedes hacerlo aquí --}}
                    <a href="{{ route('escaperoom.list') }}">Limpiar búsqueda</a>
                @endif
            </div>
            <div class="ml-auto">
                <form action="{{ route('escaperoom.list') }}" method="GET" class="d-flex">
                    <div class="input-group">
                        <input type="text" name="filterValue" placeholder="Buscar por nombre" class="form-control rounded border-danger text-secondary">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-info bg-danger border-danger">Buscar</button>
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
                            <th>Nombre</th>
                            <th>Localitat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($escaperoom as $escape)
                            <tr>
                                <td>{{$escape->name}}</td>
                                <td>@isset($escape->location) {{ $escape->location->nom() }} @endisset</td>
                                
                                <td style="display: flex">

                                <a href="{{ route('escaperoom.edit', ['id' => $escape->id]) }}"class="text-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/> 
                                    </svg> 
                                </a>
                            &nbsp &nbsp
                                <a href="{{ route('escaperoom.delete', ['id' => $escape->id]) }}"class="text-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                                            </svg>
                                </a>
                               </td>
                           </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-3">
        {{ $escaperoom->links()}}
    </div>
        </div>
    </div>

</div>
@stop
