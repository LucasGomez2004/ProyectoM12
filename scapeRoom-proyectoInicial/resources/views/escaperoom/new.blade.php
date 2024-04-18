@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class='text-center'><b>Service</b></h1>
@stop

@section('content')
<div class="container-fluid">

<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add New Service</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('service.new')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    {{-- Name --}}
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <span style="color:red;">*</span>Name</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('name') is-invalid @enderror" 
                            id="exampleName"
                            placeholder="Name" 
                            name="name" 
                            value="{{ old('name') }}">

                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Location --}}
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <span style="color:red;">*</span>Location</label>
                        <select name="location_id" class="form-control @error('location_id') is-invalid @enderror">
                            <option value="">-- Select a location --</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}" {{ old('location_id') == $location->id ? 'selected' : '' }}>
                                    {{ $location->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('location_id')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                </div>
                {{-- Save Button --}}
                <button type="submit" class="btn btn-success btn-user btn-block">
                    Save
                </button>
                <br>
                <a href="{{ route('escaperoom.list') }}" class="btn btn-primary float-right">&laquo; Back to EscapeRoom List</a>

            </form>
        </div>
    </div>

</div>
@stop
