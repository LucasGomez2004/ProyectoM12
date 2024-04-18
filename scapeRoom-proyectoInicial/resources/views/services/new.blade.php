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


                    {{-- Description --}}
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <span style="color:red;">*</span>Description</label>
                        <input type="text" 
                            class="form-control form-control-user @error('description') is-invalid @enderror" 
                            id="exampleDescription"
                            placeholder="Description" 
                            name="description" 
                            value="{{ old('description') }}">

                        @error('description')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Preu --}}
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <span style="color:red;">*</span>Preu</label>
                        <input type="text" 
                            class="form-control form-control-user @error('password') is-invalid @enderror" 
                            id="examplePrice"
                            placeholder="Price" 
                            name="price" 
                            value="{{ old('price') }}">

                        @error('password')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                </div>
                {{-- Save Button --}}
                <button type="submit" class="btn btn-success btn-user btn-block">
                    Save
                </button>
                <br>
                <a href="{{ route('service.list') }}" class="btn btn-primary float-right">&laquo; Back to User List</a>

            </form>
        </div>
    </div>

</div>
@stop
