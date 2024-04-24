@extends('adminlte::page')

@section('content')
<br>
<br>
<div class="row mt-2 ">
    <div class=" col-md-2 col-sm-12 "></div>
    <div class="card  col-md-8 col-sm-12">
      <br>
      <h1 class="card-title text-center">Import CSV</h1>
      <div class="card-body">
        <br>
        <form class="row g-3" action="{{route('import')}}" method="POST" enctype="multipart/form-data" style="justify-content: center;">
            @csrf
          <div class="col-md-8" >
            <input type="file" class="form-control  @error('file') is-invalid @enderror" accept="image/*" name="file" id="file" accept="application/vnd.ms-excel" onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])">
            @error('file')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <br><br>
          </div>
          <div class="col-12 text-center" >
            <button type="submit" class="btn btn-danger">Import</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  @endsection