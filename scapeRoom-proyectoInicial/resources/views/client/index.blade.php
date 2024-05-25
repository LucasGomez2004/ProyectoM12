@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    {{ Breadcrumbs::render('home') }}
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	@stop

@section('content')
<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="2000" style="max-width:95%; margin:auto;">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('images/granollers.png') }}" class="d-block w-100" alt="Granollers">
      <div class="carousel-caption d-none d-md-block bg-gray-opacity-50 text-black">
        <h1>Granollers</h1>
        <p>Granollers és un municipi de Catalunya, capital i la ciutat més poblada de la comarca del Vallès Oriental. La Porxada, edifici renaixentista que servia de llotja de gra, n'és l'edifici més emblemàtic. </p>
		<a href="#granollers" class="btn btn-success">Saber más...</a>
	  </div>
    </div>
    <div class="carousel-item">
      <img src="{{ asset('images/cardedeu.webp') }}" class="d-block w-100" alt="Cardedeu">
      <div class="carousel-caption d-none d-md-block bg-gray-opacity-50 text-black">
        <h1>Cardedeu</h1>
        <p>Barcelona és una ciutat i metròpoli a la costa mediterrània de la península Ibèrica. És la capital de Catalunya, així com de la comarca del Barcelonès i de la província de Barcelona, i la segona ciutat en població i pes econòmic de la península Ibèrica, després de Madrid. </p>
		<a href="#cardedeu" class="btn btn-success">Saber más...</a>
	  </div>
    </div>
    <div class="carousel-item">
      <img src="{{ asset('images/franqueses.jpg') }}" class="d-block w-100" alt="Les Franqueses del Vallès">
      <div class="carousel-caption d-none d-md-block bg-gray-opacity-50 text-black">
        <h1>Les Franqueses del Vallès</h1>
        <p>Les Franqueses del Vallès és un municipi de la comarca del Vallès Oriental. Està ubicat al centre de la comarca i té una extensió de 29,1 quilòmetres quadrats. L'integren quatre pobles i un barri integrat a Corró d'Avall.</p>
		<a href="#franqueses" class="btn btn-success">Saber más...</a>
	  </div>
    </div>
    <div class="carousel-item">
      <img src="{{ asset('images/mataro.jpg') }}" class="d-block w-100" alt="Mataró">
      <div class="carousel-caption d-none d-md-block bg-gray-opacity-50 text-black">
        <h1>Mataró</h1>
        <p>Mataró és una ciutat de Catalunya, capital de la comarca del Maresme. Situada al litoral mediterrani, a uns 30 km al nord-est de Barcelona, ha estat tradicionalment un centre administratiu de rellevància territorial i un pol de dinamisme econòmic.</p>
		<a href="#mataro" class="btn btn-success">Saber más...</a>
	  </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<br><br>
<section>
	<div class="container py-2">
		<article class="postcard light blue" id="granollers">
			<a class="postcard__img_link">
				<img class="postcard__img" src="{{ asset('images/granollers.jpg') }}" alt="Granollers">
			</a>
			<div class="postcard__text t-dark">
				<h1 class="postcard__title blue"><a href="#">Granollers</a></h1>
				<div class="postcard__bar"></div>
				<div class="postcard__preview-txt">L'Escape Room de Granollers ofereix una experiència immersiva on els participants han de resoldre énigmes i puzzles en una habitació temàtica per aconseguir escapar abans que s'acabi el temps. Amb temes intrigants com desxifrar codis secrets o resoldre misteris, aquesta atracció promet diversió i emoció per a grups d'amics, famílies o companys de treball que busquen una aventura memorable.</div>
				<br>
				<div class="postcard__calle-txt"><b>Carrer del Camp de les Moreres, 14, 08401</b></div>
				<ul class="postcard__tagbox">
					<li class="tag__item"><i class="fas fa-clock mr-2"></i>1 h</li>
					<li class="tag__item play blue">
						<a href="{{ route('client.reserva', ['localidad' => 'Granollers']) }}"><i class="fas fa-calendar-plus mr-2"></i>Reserva ya!</a>
					</li>
				</ul>
			</div>
		</article>
		<article class="postcard light red" id="cardedeu">
			<a class="postcard__img_link" href="#">
				<img class="postcard__img" src="{{ asset('images/cardedeu.jpg') }}" alt="Cardedeu">	
			</a>
			<div class="postcard__text t-dark">
				<h1 class="postcard__title red"><a href="#">Cardedeu</a></h1>
				<div class="postcard__bar"></div>
				<div class="postcard__preview-txt">L'Escape Room de Cardedeu et convida a viure una experiència fascinant on hauràs de posar a prova la teva astúcia i habilitat per resoldre els enigmes més complexos. Ambientat en escenaris únics i temàtiques emocionants, aquesta aventura et portarà a un món ple de misteris i intriga. Ja sigui amb amics, família o companys de treball, prepara't per a una escapada inoblidable a Cardedeu.</div>
				<br>
				<div class="postcard__calle-txt"><b>Passeig de Pau Gesa, 1, 08440</b></div>
				<ul class="postcard__tagbox">
					<li class="tag__item"><i class="fas fa-clock mr-2"></i>1 h</li>
					<li class="tag__item play red">
						<a href="{{ route('client.reserva', ['localidad' => 'Cardedeu']) }}"><i class="fas fa-calendar-plus mr-2"></i>Reserva ya!</a>
					</li>
				</ul>
			</div>
		</article>
		<article class="postcard light green" id="franqueses">
			<a class="postcard__img_link" href="#">
				<img class="postcard__img" src="{{ asset('images/franqueses.jpg') }}" alt="Les Franqueses del Vallès">
			</a>
			<div class="postcard__text t-dark">
				<h1 class="postcard__title green"><a href="#">Les Franqueses del Vallès</a></h1>
				<div class="postcard__bar"></div>
				<div class="postcard__preview-txt">Descobreix l'Escape Room de Les Franqueses del Vallès, on l'aventura i la diversió estan garantides. Aquest espai únic ofereix una varietat de temàtiques i desafiaments que posaran a prova el teu enginy i treball en equip. Perfecte per a grups d'amics, famílies i esdeveniments corporatius, aquesta experiència et farà sentir com un veritable detectiu resolent misteris i escapant en temps rècord.</div>
				<br>
				<div class="postcard__calle-txt"><b>Carrer de la Indústria, 22, 08520</b></div>
				<ul class="postcard__tagbox">
					<li class="tag__item"><i class="fas fa-clock mr-2"></i>1 h</li>
					<li class="tag__item play green">
						<a href="{{ route('client.reserva', ['localidad' => 'Franqueses']) }}"><i class="fas fa-calendar-plus mr-2"></i>Reserva ya!</a>
					</li>
				</ul>
			</div>
		</article>
		<article class="postcard light yellow" id="mataro">
			<a class="postcard__img_link" href="#">
				<img class="postcard__img" src="{{ asset('images/mataro.jpg') }}" alt="Mataró">	
			</a>
			<div class="postcard__text t-dark">
				<h1 class="postcard__title yellow"><a href="#">Mataró</a></h1>
				<div class="postcard__bar"></div>
				<div class="postcard__preview-txt">Viu l'emoció de l'Escape Room a Mataró, una experiència dissenyada per desafiar la teva ment i els teus sentits. En aquest espai, hauràs de col·laborar amb el teu equip per desxifrar pistes i superar obstacles en un temps limitat. Ideal per a una sortida amb amics, una activitat familiar o una jornada de team building, l'Escape Room de Mataró t'ofereix una aventura plena de diversió i misteri.</div>
				<br>
				<div class="postcard__calle-txt"><b>Carrer de la Riera, 48, 08301</b></div>
				<ul class="postcard__tagbox">
					<li class="tag__item"><i class="fas fa-clock mr-2"></i>1 h</li>
					<li class="tag__item play yellow">
						<a href="{{ route('client.reserva', ['localidad' => 'Mataró']) }}"><i class="fas fa-calendar-plus mr-2"></i>Reserva ya!</a>
					</li>
				</ul>
			</div>
		</article>
	</div>
</section>


@stop

@section('css')
<style>
	@media screen and (max-width: 768px) {
        .embed-responsive-16by9 {
            max-width: 100%;
        }
    }
</style>

    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Baloo+2&display=swap");
$main-green: #79dd09 !default;
$main-green-rgb-015: rgba(121, 221, 9, 0.1) !default;
$main-yellow: #bdbb49 !default;
$main-yellow-rgb-015: rgba(189, 187, 73, 0.1) !default;
$main-red: #bd150b !default;
$main-red-rgb-015: rgba(189, 21, 11, 0.1) !default;
$main-blue: #0076bd !default;
$main-blue-rgb-015: rgba(0, 118, 189, 0.1) !default;

/* This pen */
body {
	font-family: "Baloo 2", cursive;
	font-size: 16px;
	color: #ffffff;
	text-rendering: optimizeLegibility;
	font-weight: initial;
}

.light {
	background: #f3f5f7;
}

a, a:hover {
	text-decoration: none;
	transition: color 0.3s ease-in-out;
}

#pageHeaderTitle {
	margin: 2rem 0;
	text-transform: uppercase;
	text-align: center;
	font-size: 2.5rem;
}

/* Cards */
.postcard {
  flex-wrap: wrap;
  display: flex;
  
  box-shadow: 0 4px 21px -12px rgba(0, 0, 0, 0.66);
  border-radius: 10px;
  margin: 0 0 2rem 0;
  overflow: hidden;
  position: relative;
  color: #ffffff;
  
	&.light {
		background-color: #e1e5ea;
	}
	
	.t-dark {
		color: #18151f;
	}
	
    a {
        color: inherit;
    }
	
	h1,	.h1 {
		margin-bottom: 0.5rem;
		font-weight: 500;
		line-height: 1.2;
	}
	
	.small {
		font-size: 80%;
	}

  .postcard__title {
    font-size: 1.75rem;
  }

  .postcard__img {
    max-height: 180px;
    width: 100%;
    object-fit: cover;
    position: relative;
  }

  .postcard__img_link {
    display: contents;
  }

  .postcard__bar {
    width: 50px;
    height: 10px;
    margin: 10px 0;
    border-radius: 5px;
    background-color: #424242;
    transition: width 0.2s ease;
  }

  .postcard__text {
    padding: 1.5rem;
    position: relative;
    display: flex;
    flex-direction: column;
  }

  .postcard__calle-txt{
	font-size: 12px;
  }

  .postcard__preview-txt {
    overflow: hidden;
    text-overflow: ellipsis;
    text-align: justify;
    height: 100%;
  }

  .postcard__tagbox {
    display: flex;
    flex-flow: row wrap;
    font-size: 14px;
    margin: 20px 0 0 0;
		padding: 0;
    justify-content: center;

    .tag__item {
      display: inline-block;
      background: rgba(83, 83, 83, 0.4);
      border-radius: 3px;
      padding: 2.5px 10px;
      margin: 0 5px 5px 0;
      cursor: default;
      user-select: none;
      transition: background-color 0.3s;

      &:hover {
        background: rgba(83, 83, 83, 0.8);
      }
    }
  }

  &:before {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-image: linear-gradient(-70deg, #930404, transparent 50%);
    opacity: 1;
    border-radius: 10px;
  }

  &:hover .postcard__bar {
    width: 100px;
  }
}

@media screen and (min-width: 769px) {
  .postcard {
    flex-wrap: inherit;

    .postcard__title {
      font-size: 2rem;
    }

    .postcard__tagbox {
      justify-content: start;
    }

    .postcard__img {
      max-width: 300px;
      max-height: 100%;
      transition: transform 0.3s ease;
    }

    .postcard__text {
      padding: 3rem;
      width: 100%;
    }

    .media.postcard__text:before {
      content: "";
      position: absolute;
      display: block;
      background: #18151f;
      top: -20%;
      height: 130%;
      width: 55px;
    }

    &:hover .postcard__img {
      transform: scale(1.1);
    }

    &:nth-child(2n+1) {
      flex-direction: row;
    }

    &:nth-child(2n+0) {
      flex-direction: row-reverse;
    }

    &:nth-child(2n+1) .postcard__text::before {
      left: -12px !important;
      transform: rotate(4deg);
    }

    &:nth-child(2n+0) .postcard__text::before {
      right: -12px !important;
      transform: rotate(-4deg);
    }
  }
}
@media screen and (min-width: 1024px){
		.postcard__text {
      padding: 2rem 3.5rem;
    }
		
		.postcard__text:before {
      content: "";
      position: absolute;
      display: block;
      
      top: -20%;
      height: 130%;
      width: 55px;
    }
	
  .postcard.dark {
		.postcard__text:before {
			background: #18151f;
		}
  }
	.postcard.light {
		.postcard__text:before {
			background: #e1e5ea;
		}
  }
}

/* COLORS */
.postcard .postcard__tagbox .green.play:hover {
	background: $main-green;
	color: black;
}
.green .postcard__title:hover {
	color: $main-green;
}
.green .postcard__bar {
	background-color: $main-green;
}
.green::before {
	background-image: linear-gradient(
		-30deg,
		$main-green-rgb-015,
		transparent 50%
	);
}
.green:nth-child(2n)::before {
	background-image: linear-gradient(30deg, $main-green-rgb-015, transparent 50%);
}

.postcard .postcard__tagbox .blue.play:hover {
	background: $main-blue;
}
.blue .postcard__title:hover {
	color: $main-blue;
}
.blue .postcard__bar {
	background-color: $main-blue;
}
.blue::before {
	background-image: linear-gradient(-30deg, $main-blue-rgb-015, transparent 50%);
}
.blue:nth-child(2n)::before {
	background-image: linear-gradient(30deg, $main-blue-rgb-015, transparent 50%);
}

.postcard .postcard__tagbox .red.play:hover {
	background: $main-red;
}
.red .postcard__title:hover {
	color: $main-red;
}
.red .postcard__bar {
	background-color: $main-red;
}
.red::before {
	background-image: linear-gradient(-30deg, $main-red-rgb-015, transparent 50%);
}
.red:nth-child(2n)::before {
	background-image: linear-gradient(30deg, $main-red-rgb-015, transparent 50%);
}

.postcard .postcard__tagbox .yellow.play:hover {
	background: $main-yellow;
	color: black;
}
.yellow .postcard__title:hover {
	color: $main-yellow;
}
.yellow .postcard__bar {
	background-color: $main-yellow;
}
.yellow::before {
	background-image: linear-gradient(
		-30deg,
		$main-yellow-rgb-015,
		transparent 50%
	);
}
.yellow:nth-child(2n)::before {
	background-image: linear-gradient(
		30deg,
		$main-yellow-rgb-015,
		transparent 50%
	);
}

@media screen and (min-width: 769px) {
	.green::before {
		background-image: linear-gradient(
			-80deg,
			$main-green-rgb-015,
			transparent 50%
		);
	}
	.green:nth-child(2n)::before {
		background-image: linear-gradient(
			80deg,
			$main-green-rgb-015,
			transparent 50%
		);
	}

	.blue::before {
		background-image: linear-gradient(
			-80deg,
			$main-blue-rgb-015,
			transparent 50%
		);
	}
	.blue:nth-child(2n)::before {
		background-image: linear-gradient(80deg, $main-blue-rgb-015, transparent 50%);
	}

	.red::before {
		background-image: linear-gradient(-80deg, $main-red-rgb-015, transparent 50%);
	}
	.red:nth-child(2n)::before {
		background-image: linear-gradient(80deg, $main-red-rgb-015, transparent 50%);
	}
	
	.yellow::before {
		background-image: linear-gradient(
			-80deg,
			$main-yellow-rgb-015,
			transparent 50%
		);
	}
	.yellow:nth-child(2n)::before {
		background-image: linear-gradient(
			80deg,
			$main-yellow-rgb-015,
			transparent 50%
		);
	}
}
/* Carousel */
.bg-gray-opacity-50 {
    background-color: rgba(211, 211, 211, 0.8); 
}
.text-black {
    color: black; 
}
    </style>
@stop

@section('js')
    <script>
        var video = document.getElementById("myVideo");

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
    <strong>Copyright &copy; {{ date('Y') }} <a href="https://www.instagram.com/escapeordie_bcn/">Escape Or Die</a></strong>
    <div class="float-right d-none d-sm-inline">
        <strong>
            <a href="{{ route('client.privacidad') }}">Política de privacidad</a> 
        </strong>
    </div>
@stop

