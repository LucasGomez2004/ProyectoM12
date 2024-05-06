@extends('adminlte::page')

@section('title', 'Contacto')

@section('content_header')
    <h1 class="text-center">Contacto</h1>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>


@stop

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <p>¡Bienvenido a nuestra página de contacto! Por favor, completa el formulario a continuación y te responderemos lo antes posible.</p>
                <form method="POST" action="{{ route('contact.new')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="asunto">Asunto</label>
                        <input type="text" class="form-control" id="asunto" name="asunto" required>
                    </div>
                    <div class="form-group">
                        <label for="mensaje">Mensaje</label>
                        <textarea class="form-control" id="mensaje" name="mensaje" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-danger">Enviar Mensaje</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><b>Ubicación</b></h3>
            </div>
            <div class="card-body">
                <div id="map" style="height: 400px;"></div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
@stop


@section('js')
<script>
        // Granollers

        const latICVGranollers = 41.60797885210383;
        const lonICVGranollers = 2.287634119459574;

        var mapGranollers = L.map('map').setView([latICVGranollers, lonICVGranollers], 11);

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