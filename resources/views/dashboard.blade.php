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

    <style>
        html, body, #wrapper {
            overflow: hidden;
        }

    </style>


    <div class="row">

        <!-- Map start -->
        <div id="map" class="col-lg-10"></div>
        <!-- Map end -->

        <div class="col-lg-2" style="padding: 0; margin: 0;">

            <!-- State filter panel start -->
            <div class="col-lg-12" style="padding: 0; margin: 0;">

                <div class="panel panel-default" style="padding: 0; margin: 0;">
                    <div class="panel-heading text-center"><strong>DRIVER STATE</strong></div>

                    <div class="panel-body">
                        <button type="button" class="btn btn-success filter-state-btn" value="1" name="available">AVAILABLE</button>
                        <button type="button" class="btn btn-default filter-state-btn" value="0" name="goingForHire">GOING FOR HIRE</button>
                        <button type="button" class="btn btn-default filter-state-btn" value="0" name="inHire">IN HIRE</button>
                        <button type="button" class="btn btn-default filter-state-btn" value="0" name="notInService">NOT IN SERVICE</button>
                    </div>
                </div>

            </div>
            <!-- State filter panel end -->

            <!-- Filter panel start -->
            <div class="col-lg-12" style="padding: 0; margin: 0;">

                <div class="panel panel-default">
                    <div class="panel-heading text-center"><strong>TAXI TYPE</strong></div>

                    <div class="panel-body">
                        <button type="button" class="btn btn-info filter-type-btn" value="1" name="nano">NANO</button>
                        <button type="button" class="btn btn-info filter-type-btn" value="1" name="car">CAR</button>
                        <button type="button" class="btn btn-info filter-type-btn" value="1" name="van">VAN</button>
                    </div>
                </div>

            </div>
            <!-- Filter panel end -->

        </div>

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

    <!-- Driver state filter panel button clicks -->
    <script>

        $(".filter-orders-btn").click(function () {
            $(this).toggleClass("btn-success");
            if(this.value==0){
                this.value=1;
            }
            else{
                this.value=0;
            }
            loadLocations();
        });

    </script>

    <!-- Taxi type filter panel button clicks -->
    <script>

        $(".filter-type-btn").click(function () {
            $(this).toggleClass("btn-info");
            if(this.value==0){
                this.value=1;
            }
            else{
                this.value=0;
            }
            loadLocations();
        });

    </script>

    <script type="text/javascript">

        function loadLocations() {
            var notInService = $("[name='notInService']").val();
            var available = $("[name='available']").val();
            var goingForHire = $("[name='goingForHire']").val();
            var inHire = $("[name='inHire']").val();

            var url = "/updates";

            $.ajax({
                type:"GET",
                url:url,
                data: { notInService:notInService, available: available, goingForHire: goingForHire,inHire:inHire },
                success:function (result) {
                    clearMarkers();
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
            markers = [];
        }

        function setMarkers(updates){
            var nano = $("[name='nano']").val();
            var car = $("[name='car']").val();
            var van = $("[name='van']").val();

            var infowindow = new google.maps.InfoWindow();

            var marker, i;
            markers = [];

            $.each(updates, function (key, updateSet) {
                $.each(updateSet, function (key, update) {
                    if((update.taxi_type === "Nano" && nano==1) || (update.taxi_type === "Car" && car==1) || (update.taxi_type === "Van" && van==1)){
                        marker = new google.maps.Marker({
                            position: new google.maps.LatLng(update.latitude, update.longitude),
                            map: map
                        });

                        markers.push(marker);

                        google.maps.event.addListener(marker, 'click', (function(marker, i) {
                            return function() {
                                infowindow.setContent("<strong>" + update.name + "</strong>" + "<br>" + update.taxi_model);
                                infowindow.open(map, marker);
                            }
                        })(marker, i));
                    }
                })
            });
        }
    </script>

    <script>
        $(document).ready(function () {
            setInterval(function () {
                loadLocations();
            }, 5000)
        });
    </script>

@stop