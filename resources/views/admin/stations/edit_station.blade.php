@extends('admin.admin_layout')
@section('content')
    <div class="content">
        <div class="row-cols-auto container-fluid">
            <form action="{{url('/update-station/'.$station->id)}}" method="post" >
                @csrf
                <div class="form-group">
                    <label for="station_name">Station Name</label>
                    <input type="text" class="form-control" name="station_name" value="{{$station->station_name}}">
                </div>
                <div class="row">
                    <div class="col-md pr-1">
                        <div class="form-group">
                            <label for="lng">Lng</label>
                            <input type="text" name="lng" class="form-control" value="{{$station->lng}}">
                        </div>
                    </div>
                    <div class="col-md pl-1">
                        <div class="form-group">
                            <label for="lat">Lat</label>
                            <input type="text" name="lat" class="form-control" value="{{$station->lat}}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="station_status">Status</label>
                    <select class="form-control" name="station_status">
                        <option hidden value="{{$station->station_status}}">
                            {{$station->station_status ? 'Show' : 'Hidden'}}
                        </option>
                        <option value="1">Show</option>
                        <option value="0">Hidden</option>
                    </select>
                </div>
                <button class="btn btn-default" type="submit">Submit</button>
            </form>
        </div>
    </div>

@endsection
