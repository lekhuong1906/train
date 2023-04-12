@extends('pages.layout')
@section('content')
    <style>
        #map {
            height: 400px;
            width: 100%;
            }
    </style>
        <div class="container mt-5">
            <div id="map"></div>
        </div>

    <script>
        function initMap() {

            const myLatLng = {lat: 10.80063, lng: 106.73214};

            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 15,
                center: myLatLng,
            });

            //marker
            let data = @json($all_station);
            console.log(data)
            data.forEach(function (value) {
                let marker = new google.maps.Marker({
                    position: {lat: value.lat, lng: value.lng}, map,
                    title: value.station_name,
                })
                marker.setMap(map);
            })

        }
        window.initMap = initMap;
    </script>
@endsection
