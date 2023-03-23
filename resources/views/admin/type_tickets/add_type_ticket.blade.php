@extends('admin.admin_layout')
@section('content')
    <div class="row-cols-auto container-fluid">
        <form action="{{url('/save-type-ticket')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="type_name">Type Ticket Name</label>
                <input type="text" class="form-control" name="type_name" placeholder="VT30">
            </div>
            <div class="form-group">
                <label for="type_description">Ticket Type Description</label>
                <textarea class="form-control" name="type_description" rows="3" placeholder="Ticket type description"></textarea>
            </div>
            <div class="form-group">
                <label for="total_day">Total Day</label>
                <input type="text" class="form-control" name="total_day" placeholder="5 day">
            </div>
            <div class="form-group">
                <label for="type_price">Type Ticket Price</label>
                <input type="text" class="form-control" name="type_price" placeholder="50.000vnd">
            </div>
            <div class="form-group">
                <label for="type_status">Type Ticket Status</label>
                <select class="form-control" name="type_status">
                    <option value="1">Show</option>
                    <option value="0">Hidden</option>
                </select>
            </div>
            <button class="btn btn-default" type="submit">Submit</button>
        </form>
    </div>
@endsection
