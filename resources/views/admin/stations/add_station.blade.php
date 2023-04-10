@extends('admin.admin_layout')
@section('content')
    <div class="content">
        <div class="row-cols-auto container-fluid">
            <form action="{{url('/save-station')}}" method="post">
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
    </div>
@endsection
