@extends('admin.admin_layout')
@section('content')
    <div class="content">
        <div class="row-cols-auto container-fluid">
            <form class="form-inline" method="get">
                <div class="form-group row">
                    <label for="station_status" class="col-sm col-form-label">Station Status</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="station_status">
                            <option value="1">Show</option>
                            <option value="0">Hidden</option>
                            <option value="-1">All</option>
                        </select>
                    </div>
                    <button class="btn btn-default sm-2" type="submit">Submit</button>
                </div>
            </form>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> List Of Station</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary text-center">
                            <th>
                                Station Name
                            </th>
                            <th>
                                Lng
                            </th>
                            <th>
                                Lat
                            </th>
                            <th>
                                Station Status
                            </th>
                            <th class="text-right">
                            </th>
                            </thead>
                            <tbody class="text-center">
                            @foreach($all_station as $station)
                                <tr>
                                    <td>
                                        {{$station->station_name}}
                                    </td>
                                    <td>
                                        {{$station->lng}}
                                    </td>
                                    <td>
                                        {{$station->lat}}
                                    </td>
                                    <td style="color: {{$station->station_status ? 'Green' : 'Red'}};">
                                        {{$station->station_status ? 'Active' : 'UnActive'}}
                                    </td>

                                    <td class="text-right">
                                        <a href="{{url('/edit-station/'.$station->id)}}"><i
                                                class="nc-icon nc-alert-circle-i"></i></a>
                                        <a onclick="return confirm('Are you sure you want to delete this Station?')"
                                           href="{{url('/delete-station/'.$station->id)}}"><i
                                                class="nc-icon nc-simple-remove" style="color: red"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                                            {{$all_station->appends(request()->all())->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
