@extends('layouts.app')

@section('content')

    <style>
        #page-wrapper {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        #map{
            height:100%;
            width:100%;
        }
    </style>

    <div id="map"></div>
    <script>
        function initMap() {
            var mapDiv = document.getElementById('map');
            var map = new google.maps.Map(mapDiv, {
                center: {lat: 6.9271, lng: 79.8612},
                zoom: 8
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?callback=initMap"
            async defer></script>

@stop