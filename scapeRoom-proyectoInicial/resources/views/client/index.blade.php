@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    {{ Breadcrumbs::render('home') }}
@stop

@section('content')

<div class="embed-responsive embed-responsive-16by9" style="max-width: 90%; margin: 0 auto;">
    <video autoplay muted controls loop id="myVideo" class="embed-responsive-item" style="width: 100%; height: auto;">
        <source src="images/video.mp4" type="video/mp4">
    </video>
</div>

<br>
<br>
<section>
	<div class="container py-2">
		<div class="h1 text-center text-dark" id="pageHeaderTitle">Localidades</div>

		<article class="postcard light blue">
			<a class="postcard__img_link" href="#">
				<img class="postcard__img" src="images/granollers.jpg" alt="Image Title" />
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
					<a href="{{ route('client.reserva', ['localidad' => 'Granollers']) }}"><i class="fas fa-play mr-2"></i>Reserva ya!</a>
					</li>
				</ul>
			</div>
		</article>
		<article class="postcard light red">
			<a class="postcard__img_link" href="#">
				<img class="postcard__img" src="images/cardedeu.jpg" alt="Image Title" />	
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
						<a href="{{ route('client.reserva', ['localidad' => 'Cardedeu']) }}"><i class="fas fa-play mr-2"></i>Reserva ya!</a>
					</li>
				</ul>
			</div>
		</article>
		<article class="postcard light green">
			<a class="postcard__img_link" href="#">
				<img class="postcard__img" src="images/franqueses.jpg" alt="Image Title" />
			</a>
			<div class="postcard__text t-dark">
				<h1 class="postcard__title green"><a href="#">Les Franqueses del Vallès</a></h1>
				<div class="postcard__bar"></div>
				<div class="postcard__preview-txt">Descobreix una nova dimensió d'entreteniment a Les Franqueses del Vallès amb l'Escape Room local. Amb una combinació de reptes mental i treball en equip, aquesta experiència et transportarà a escenaris emocionants on hauràs de desxifrar codis i trobar pistes per aconseguir escapar. Una opció perfecta per a grups que busquen una activitat estimulant i divertida a Les Franqueses.</div>
				<br>
				<div class="postcard__calle-txt"><b>Carretera de Ribes, 4, 08520</b></div>
				<ul class="postcard__tagbox">
					<li class="tag__item"><i class="fas fa-clock mr-2"></i>1 h</li>
					<li class="tag__item play green">
						<a href="{{ route('client.reserva', ['localidad' => 'Franqueses']) }}"><i class="fas fa-play mr-2"></i>Reserva ya!</a>
					</li>
				</ul>
			</div>
		</article>
		<article class="postcard light yellow">
			<a class="postcard__img_link" href="#">
				<img class="postcard__img" src="images/mataro.jpg" alt="Image Title" />
			</a>
			<div class="postcard__text t-dark">
				<h1 class="postcard__title yellow"><a href="#">Mataró</a></h1>
				<div class="postcard__bar"></div>
				<div class="postcard__preview-txt">L'Escape Room de Mataró et proposa una aventura plena d'emoció i adrenalina en la qual hauràs de posar a prova les teves habilitats detectivesques. Desxifra codis, resol misteris i treballa en equip per superar tots els reptes i aconseguir escapar abans que s'acabi el temps. Amb temes variats i emocionants, és una experiència perfecta per a tot tipus de grups a Mataró.</div>
				<br>
				<div class="postcard__calle-txt"><b>Carrer Puig i Pidemunt, 12, 08302</b></div>
				<ul class="postcard__tagbox">
					<li class="tag__item"><i class="fas fa-clock mr-2"></i>1 h</li>
					<li class="tag__item play yellow">
						<a href="{{ route('client.reserva', ['localidad' => 'Mataró']) }}"><i class="fas fa-play mr-2"></i>Reserva ya!</a>
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
