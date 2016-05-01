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
                    <button type="button" class="btn btn-success filter-btn" value="1" name="available">AVAILABLE</button>
                    <button type="button" class="btn btn-default filter-btn" value="0" name="goingForHire">GOING FOR HIRE</button>
                    <button type="button" class="btn btn-default filter-btn" value="0" name="inHire">IN HIRE</button>
                    <button type="button" class="btn btn-default filter-btn" value="0" name="notInService">NOT IN SERVICE</button>
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
            var notInService = $("[name='notInService']").val();
            var available = $("[name='available']").val();
            var goingForHire = $("[name='goingForHire']").val();
            var inHire = $("[name='inHire']").val();

            var url = "/updates?notInService=" + notInService + "&available=" + available + "&goingForHire=" + goingForHire + "&inHire=" + inHire;

            $.ajax({
                type:"GET",
                url:url,
                success:function (result) {
                    setMarkers(result)
                },
                dataType:'json'
            });
        }

        function clearMarkers() {
            var i;
            for(i=0;i<markers.length;i++){
                markers[i].setMap(null);
            }
        }

        function setMarkers(locations){
            $.each(locations, function (state, taxis) {
                $.each(taxis, function (key, taxi) {
                    $item = {'latitude' : taxi.latitude, 'longitude' : taxi.longitude};
                    alert($item.latitude);
                })
            });
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

    <script>
        $(document).ready(function () {
            setInterval(function () {
                loadLocations();
            }, 1000)
        });
    </script>

@stop