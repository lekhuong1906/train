@extends('admin.admin_layout')
@section('content')
    <div class="row-cols-auto container-fluid">
        <form class="form-inline" id="form_filler" method="get">
            <div class="form-group row">
                <label for="type_status" class="col-sm col-form-label">Type Ticket Status</label>
                <div class="col-sm-4">
                    <select class="form-control" name="type_status">
                        <option value="1">Active</option>
                        <option value="0">UnActive</option>
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
                <h4 class="card-title"> List Of Type Ticket</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary text-center">
                        <th>
                            Type Name
                        </th>
                        <th>
                            Total Day
                        </th>
                        <th>
                            Type Price
                        </th>
                        <th>
                            Type status
                        </th>
                        <th class="text-right">
                        </th>
                        </thead>
                        <tbody class="text-center">
                        @foreach($all_type_ticket as $type_ticket)
                            <tr>
                                <td>
                                    {{$type_ticket->type_name}}
                                </td>
                                <td>
                                    {{$type_ticket->total_day}}
                                </td>
                                <td>
                                    {{number_format($type_ticket->type_price).' vnd'}}
                                </td>
                                <td style="color: {{$type_ticket->type_status ? 'Green' : 'Red'}};">
                                    {{$type_ticket->type_status ? 'Active' : 'UnActive'}}
                                </td>
                                <td class="text-right">
                                    <a href="{{url('/edit-type-ticket/'.$type_ticket->id)}}"><i class="nc-icon nc-alert-circle-i"></i></a>
                                    <a onclick="return confirm('Are you sure you want to delete this type ticket?')" href="{{url('/delete-type-ticket/'.$type_ticket->id)}}"><i class="nc-icon nc-simple-remove" style="color: red"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$all_type_ticket->appends(request()->all())->links()}}
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready()
    </script>
@endsection
