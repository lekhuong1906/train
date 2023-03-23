@extends('admin.admin_layout')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> List Of Type Ticket</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
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
                        <tbody>
                        @foreach($all_type_ticket as $type_ticket)
                            <tr>
                                <td>
                                    {{$type_ticket->type_name}}
                                </td>
                                <td>
                                    {{$type_ticket->total_day}}
                                </td>
                                <td>
                                    {{$type_ticket->type_price}}
                                </td>
                                <td>
                                    @if($type_ticket->type_status)
                                        {{'Active'}}
                                        @else {{'Unactive'}} @endif
                                </td>
                                <td class="text-right">
                                    <a href="{{url('/edit-type-ticket/'.$type_ticket->id)}}"><i class="nc-icon nc-alert-circle-i"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
