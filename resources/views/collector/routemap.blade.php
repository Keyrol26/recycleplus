@extends('layouts.master')
@section('tittle')
    <title>RecyclePlus | Dashboard</title>
@endsection
@section('nav-head')
    <div>
        <h1>Route Map!</h1>
        <p>We are on a mission to help developers like you build successful projects for
            FREE.</p>
    </div>
@endsection
@section('content')
    <style>
        /* Set the map height and width */
        #map {
            height: 500px;
            width: 100%;
        }
    </style>
    <div class="conatiner-fluid content-inner mt-n5 py-0">
        <div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div class="card-title mb-0">
                                <h4 class="mb-0">Calender</h4>
                            </div>
                            <div class="card-action">
                                <a href="#" class="btn btn-primary" role="button">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card  ">
                                <div class="card-body">
                                    <div id="map"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key=@json($key)"></script>
    <script>
        function initMap() {
            const origin = @json($fulladress1);
            const destination = @json($fulladress2);

            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 7,
                center: {
                    lat: 3.139,
                    lng: 101.6869
                },
            });

            const directionsService = new google.maps.DirectionsService();
            const directionsRenderer = new google.maps.DirectionsRenderer();
            directionsRenderer.setMap(map);

            directionsService.route({
                    origin: fulladress1,
                    destination: fulladress2,
                    travelMode: google.maps.TravelMode.DRIVING,
                },
                (response, status) => {
                    if (status === "OK") {
                        directionsRenderer.setDirections(response);
                    } else {
                        console.error("Directions request failed due to " + status);
                    }
                }
            );
        }

        google.maps.event.addDomListener(window, "load", initMap);
    </script>
@endsection
