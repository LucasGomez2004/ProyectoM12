@extends('adminlte::page')
@section('title', 'Contacto')
@section('content_header')
    <h1 class="text-center"><b>Formulario de contacto</b></h1>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
@stop
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
<div class="container">
    <div class="contact__wrapper shadow-lg mt-n9">
        <div class="row no-gutters">
            <div class="col-lg-5 contact-info__wrapper gradient-brand-color p-5 order-lg-2 " id="map" >
    
                <figure class="figure position-absolute m-0 opacity-06 z-index-100" style="bottom:0; right: 10px">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="444px" height="626px">
                        <defs>
                            <linearGradient id="PSgrad_1" x1="0%" x2="81.915%" y1="57.358%" y2="0%">
                                <stop offset="0%" stop-color="rgb(255,255,255)" stop-opacity="1"></stop>
                                <stop offset="100%" stop-color="rgb(0,54,207)" stop-opacity="0"></stop>
                            </linearGradient>
    
                        </defs>
                        <path fill-rule="evenodd" opacity="0.302" fill="rgb(72, 155, 248)" d="M816.210,-41.714 L968.999,111.158 L-197.210,1277.998 L-349.998,1125.127 L816.210,-41.714 Z"></path>
                        <path fill="url(#PSgrad_1)" d="M816.210,-41.714 L968.999,111.158 L-197.210,1277.998 L-349.998,1125.127 L816.210,-41.714 Z"></path>
                    </svg>
                </figure>
            </div>

            <div class="col-lg-7 contact-form__wrapper p-5 order-lg-1">
                <form action="{{ route('enviar.mensaje') }}" class="contact-form form-validate" novalidate="novalidate">
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label class="required-field" for="firstName">Nombre:</label>
                                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Escribe aquí tu nombre...">
                            </div>
                        </div>
    
                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label for="lastName">Apellidos:</label>
                                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Escribe aquí tus apellidos...">
                            </div>
                        </div>
    
                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label class="required-field" for="email">Correo electrónico:</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Tu correo electrónico...">
                            </div>
                        </div>
    
                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label for="phone">Número de telefóno:</label>
                                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Tu número de telefóno...">
                            </div>
                        </div>
    
                        <div class="col-sm-12 mb-3">
                            <div class="form-group">
                                <label class="required-field" for="message">¿En qué podemos ayudarte?</label>
                                <textarea class="form-control" id="message" name="message" rows="4" placeholder="Explicame cuál es tu problema..."></textarea>
                            </div>
                        </div>
    
                        <div class="col-sm-12 mb-3">
                            <button type="submit" name="submit" class="btn btn-danger">Enviar</button>
                        </div>
    
                    </div>
                </form>
            </div>
            <!-- End Contact Form Wrapper -->
    
        </div>
    </div>

    <div class="col-lg-12 bg-danger p-5">
        <div class="row">
            <div class="col-5 align-self-center">
            <h1>¿Dónde encontrarnos?</h1>
            </div>
            <div class="col">
                <div class="row">
                    <p><b>Granollers: </b><br>Carrer del Camp de les Moreres, 14, 08401</p>
                </div>
                <div class="row">
                    <p><b>Cardedeu: </b><br>Passeig de Pau Gesa, 1, 08440</p>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <p><b>Les Franqueses: </b><br>Carretera de Ribes, 4, 08520</p>
                </div>
                <div class="row">
                    <p><b>Mataró: </b><br>Carrer Puig i Pidemunt, 12, 08302</p>
                </div>
            </div>
        </div>
    </div>
</div>
@stop


@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
    body{
    margin-top:20px;
    background:#eee;
}
.gradient-brand-color {
    background-image: -webkit-linear-gradient(0deg, #376be6 0%, #6470ef 100%);
    background-image: -ms-linear-gradient(0deg, #376be6 0%, #6470ef 100%);
    color: #fff;
}
.contact-info__wrapper {
    overflow: hidden;
    border-radius: .625rem .625rem 0 0
}
@media (min-width: 1024px) {
    .contact-info__wrapper {
        border-radius: 0 .625rem .625rem 0;
        padding: 5rem !important
    }
}
.contact-info__list span.position-absolute {
    left: 0
}
.z-index-101 {
    z-index: 101;
}
.list-style--none {
    list-style: none;
}
.contact__wrapper {
    background-color: #fff;
    border-radius: 0 0 .625rem .625rem
}
@media (min-width: 1024px) {
    .contact__wrapper {
        border-radius: .625rem 0 .625rem .625rem
    }
}
@media (min-width: 1024px) {
    .contact-form__wrapper {
        padding: 5rem !important
    }
}
.shadow-lg, .shadow-lg--on-hover:hover {
    box-shadow: 0 1rem 3rem rgba(132,138,163,0.1) !important;
}
</style>
@stop
@section('js')
<script>
        // Granollers
        const latICVGranollers = 41.60797885210383;
        const lonICVGranollers = 2.287634119459574;
        var mapGranollers = L.map('map').setView([latICVGranollers, lonICVGranollers], 10);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(mapGranollers);
        var markGranollers = L.marker([latICVGranollers, lonICVGranollers]).addTo(mapGranollers)
        markGranollers.bindTooltip("Granollers").openTooltip();
        // Cardedeu
        const latICVCardedeu = 41.638805932556934;
        const lonICVCardedeu = 2.3558900779693124;
        var markCardedeu = L.marker([latICVCardedeu, lonICVCardedeu]).addTo(mapGranollers)
        markCardedeu.bindTooltip("Cardedeu").openTooltip();
        // Franqueses
        const latICVFranqueses = 41.63674266071734;
        const lonICVFranqueses = 2.297285983484984;
        var markFranqueses = L.marker([latICVFranqueses, lonICVFranqueses]).addTo(mapGranollers)
        markFranqueses.bindTooltip("Franqueses").openTooltip();
        // Mataro
        const latICVMataro = 41.540022173773245;
        const lonICVMataro = 2.4447200904632536;
        var markMataro = L.marker([latICVMataro, lonICVMataro]).addTo(mapGranollers)
        markMataro.bindTooltip("Mataro").openTooltip();
    </script>
@stop