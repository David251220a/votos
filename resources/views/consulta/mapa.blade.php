@extends('layouts.admin')

@section('estilos')
    <!-- Incluye Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <!-- Incluye Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
@endsection

@section('contenido')
    <div class="rows">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            @if (session()->has('msj'))
                <div class="alert alert-danger" role="alert">{{session('msj')}}</div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="alert alert-danger" style="text-align: center" role="alert">
                MAPA
            </div>
        </div>
    </div>

    <div class="row">    
        <div id="map"></div>
    </div>

    <!-- Formulario para guardar la ubicación seleccionada -->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <form action="{{ route('consulta.mapa_store') }}" method="POST">
                @csrf
                <input type="hidden" id="latitude" name="latitude" value="">
                <input type="hidden" id="longitude" name="longitude" value="">
                <br>
                <button type="submit" class="btn btn-primary">Guardar Ubicación</button>
            </form>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <h3>Persona</h3>
            <input type="text" value="{{ $data->apellido_nombre }}" class="form-control">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <!-- Enlace para abrir Google Maps con la ubicación guardada -->
            @if($data->ubicacion_a && $data->ubicacion_b)
                <a href="https://www.google.com/maps?q={{ $data->ubicacion_a }},{{ $data->ubicacion_b }}" target="_blank">Ver Mapa</a>
            @else
                <span>No hay ubicación guardada.</span>
            @endif
        </div>
    </div>
@endsection



@section('scripts')
    <script>
        // Coordenadas de Asunción, Paraguay
        var defaultLat = -25.2637;
        var defaultLng = -57.5759;

        // Inicializa el mapa centrado en Asunción, Paraguay
        var map = L.map('map').setView([defaultLat, defaultLng], 13);

        // Carga y muestra la capa de OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Añade un marcador inicial en Asunción
        var marker = L.marker([defaultLat, defaultLng]).addTo(map);
        marker.bindPopup("<b>Asunción, Paraguay</b>").openPopup();

        // Variables para guardar los campos de latitud y longitud
        var latitudeInput = document.getElementById('latitude');
        var longitudeInput = document.getElementById('longitude');
        var selectedMarker;

        // Maneja el evento de clic en el mapa para seleccionar una ubicación
        map.on('click', function(e) {
            var lat = e.latlng.lat;
            var lng = e.latlng.lng;

            // Si ya hay un marcador seleccionado, lo eliminamos
            if (selectedMarker) {
                map.removeLayer(selectedMarker);
            }

            // Añade un nuevo marcador en la ubicación seleccionada
            selectedMarker = L.marker([lat, lng]).addTo(map);
            selectedMarker.bindPopup("<b>Ubicación seleccionada</b>").openPopup();

            // Actualiza los campos de latitud y longitud en el formulario
            latitudeInput.value = lat;
            longitudeInput.value = lng;

            // Muestra las coordenadas seleccionadas en la consola (opcional)
            console.log("Ubicación seleccionada:", lat, lng);
        });
    </script>
@endsection



