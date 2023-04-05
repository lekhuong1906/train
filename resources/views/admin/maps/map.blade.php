@extends('admin.admin_layout')
@section('content')
    <div class="content">
        <div class="row-cols-auto container-fluid">
            <form action="#" method="post" id="information_station">
                @csrf
                <div class="form-group">
                    <label for="station_name">Station Name</label>
                    <input type="text" class="form-control" name="station_name" placeholder="Thao Dien Station">
                </div>
                <div class="row">
                    <div class="col-md pr-1">
                        <div class="form-group">
                            <label for="lng">Lng</label>
                            <input type="text" name="lng" class="form-control" placeholder="104.85124">
                        </div>
                    </div>
                    <div class="col-md pl-1">
                        <div class="form-group">
                            <label for="lat">Lat</label>
                            <input type="text" name="lat" class="form-control" placeholder="10.15242">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="station_status">Status</label>
                    <select class="form-control" name="station_status">
                        <option value="1">Show</option>
                        <option value="0">Hidden</option>
                    </select>
                </div>
                <button class="btn btn-default" type="submit">Submit</button>
            </form>
        </div>

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
        $(document).ready(function (){

            $('#information_station').submit(function(event) {
                event.preventDefault(); // prevent form submission
                // get form data
                let formData = $(this).serializeArray();


                console.log(formData);

                $.ajax({
                    url:'add-station',
                    type:'post',
                    data:formData,
                })
            });
        });
    </script>

    <script>
        function initMap() {

            const myLatLng = { lat: 10.80063, lng: 106.73214 };

            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 15,
                center: myLatLng,
            });

            //marker
            let data = @json($all_station);
            data.forEach(function(value){
                let marker = new google.maps.Marker({
                    position: {lat: value.lat,lng: value.lng},map,
                    title: value.station_name,
                })
                marker.setMap(map);
            })

        }

        window.initMap = initMap;
    </script>


@endsection
