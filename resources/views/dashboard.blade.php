@extends('layouts.app')

@section('content')

    <style>
        #page-wrapper, .row {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        #map {
            height: 100%;
        }
    </style>

    <div class="row">

        <!-- Map start -->
        <div id="map" class="col-lg-10"></div>
        <!-- Map end -->

        <!-- Filter panel start -->
        <div id="filter-panel" class="col-lg-2" style="padding: 0; margin: 0;">

            <div class="panel panel-default">
                <div class="panel-heading text-center"><strong>Show only</strong></div>

                <div class="panel-body">
                    <button type="button" class="btn btn-success filter-btn">AVAILABLE</button>
                    <button type="button" class="btn btn-default filter-btn">GOING FOR HIRE</button>
                    <button type="button" class="btn btn-default filter-btn">IN HIRE</button>
                    <button type="button" class="btn btn-default filter-btn">NOT IN SERVICE</button>
                </div>
            </div>

        </div>
        <!-- Filter panel end -->

    </div>

    <!-- Initialize the map -->
    <script>
        function initMap() {
            var mapDiv = document.getElementById('map');
            map = new google.maps.Map(mapDiv, {
                center: {lat: 7.293693, lng: 80.641917},
                streetViewControl: false,
                zoom: 8,
                zoomControlOptions: {
                    position: google.maps.ControlPosition.RIGHT_TOP
                },
                fullscreenControl: true,
            });

            setMarkers();
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?callback=initMap"
            async defer>
    </script>

    <!-- Filter panel button clicks -->
    <script>

        $(".filter-btn").click(function () {
            $(this).toggleClass("btn-success");
        });

    </script>

    <script type="text/javascript">

        function loadLocations() {
            $.ajax({
                url:"",
                success:function(){

                },
                dataType:json
            });
        }

        function clearMarkers() {
            var i;
            for(i=0;i<markers.length;i++){
                markers[i].setMap(null);
            }
        }

        function setMarkers(){
            var infowindow = new google.maps.InfoWindow();

            var marker, i;
            markers = [];

            for (i = 0; i < locations.length; i++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    map: map
                });

                markers.push(marker);

                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infowindow.setContent(locations[i][0]);
                        infowindow.open(map, marker);
                    }
                })(marker, i));
            }
        }
    </script>


@stop