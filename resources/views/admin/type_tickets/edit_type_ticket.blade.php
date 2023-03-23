@extends('admin.admin_layout')
@section('content')
    <div class="row-cols-auto container-fluid">
        <form action="{{url('/update-type-ticket/'.$ticket_detail->id)}}" method="post">
            @csrf
            <div class="form-group">
                <label for="type_name">Type Ticket Name</label>
                <input type="text" class="form-control" name="type_name" value="{{$ticket_detail->type_name}}">
            </div>
            <div class="form-group">
                <label for="type_description">Ticket Type Description</label>
                <textarea class="form-control" name="type_description" rows="3">{{$ticket_detail->type_description}}</textarea>
            </div>
            <div class="form-group">
                <label for="total_day">Total Day</label>
                <input type="text" class="form-control" name="total_day" value="{{$ticket_detail->total_day}}">
            </div>
            <div class="form-group">
                <label for="type_price">Type Ticket Price</label>
                <input type="text" class="form-control" name="type_price" value="{{$ticket_detail->type_price}}">
            </div>
            <div class="form-group">
                <label for="type_status">Type Ticket Status</label>
                <select class="form-control" name="type_status" >
                    <option value="{{$ticket_detail}}" hidden>{!! $ticket_detail->type_status ? 'Show' :'Hidden' !!}</option>
                    <option value="1">Show</option>
                    <option value="0">Hidden</option>
                </select>
            </div>
            <button class="btn btn-default" type="submit">Submit</button>
        </form>
    </div>
@endsection
