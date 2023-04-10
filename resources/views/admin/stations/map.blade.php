@extends('admin.admin_layout')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header ">
                        Google Maps
                    </div>
                    <div class="card-body ">
                        <div id="map" class="map"></div>
                    </div>
                </div>
            </div>
        </div>
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
