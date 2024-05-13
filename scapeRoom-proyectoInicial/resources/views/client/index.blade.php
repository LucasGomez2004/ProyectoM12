@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{ Breadcrumbs::render('home') }}
@stop

@section('content')
<!-- The video -->
<div class="embed-responsive embed-responsive-16by9">
    <video autoplay muted loop id="myVideo" class="embed-responsive-item">
        <source src="images/video.mp4" type="video/mp4">
    </video>
</div>

<article class="container mb-5 mt-5">
    <h2 class="text-center"><b>Localitzacions</b> </h2>
    <br>
    <div class="row">
          <div class="col">
            <div class="row">
                <div class="card mb-3 px-0">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="./img/granollers.jpg" class="img-fluid rounded-start img-100Height object-fit-cover"
                                alt="Granollers Photo">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><b>Granollers</b></h5>
                                <p class="card-text">
                                  L'Escape Room de Granollers ofereix una experiència immersiva on els participants han de resoldre énigmes 
                                  i puzzles en una habitació temàtica per aconseguir escapar abans que s'acabi el temps. Amb temes intrigants 
                                  com desxifrar codis secrets o resoldre misteris, aquesta atracció promet diversió i emoció per a grups d'amics, 
                                  famílies o companys de treball que busquen una aventura memorable.</p>
                                  <p class="card-text">
                                    <b>C/ de Sant Jaume</b>
                                  </p>
                                <button type="button" class="btn btn-dark">Reserva ja!</button>
                            </div>
                        </div>
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
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");

        // Get the video
        var video = document.getElementById("myVideo");

        // Add click event listener to the video
        video.addEventListener("click", function() {
            if (video.paused) {
                video.play();
            } else {
                video.pause();
            }
        });
    </script>
@stop

@section('footer')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 text-center text-md-left">
                <p class="mb-0">Copyright &copy; {{ date('Y') }} <a href="">&nbsp Escape Or Die</a></p>
            </div>
            <div class="col-md-6 text-center text-md-right">
                <p class="mb-0">
                    <a href="{{ route('client.privacidad') }}">Política de privacidad</a> 
                </p>
            </div>
        </div>
    </div>
@stop
