@extends('admin.admin_layout')
@section('content')
    <div class="row-cols-auto container-fluid">
        <form class="form-inline" method="get">
            <div class="form-group row">
                <label for="type_status" class="col-sm col-form-label">Receipt Status</label>
                <div class="col-sm-4">
                    <select class="form-control" name="receipt_status">
                        <option value="1">Valid</option>
                        <option value="0">Invalid</option>
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
                <h4 class="card-title"> List Of Receipt</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary text-center">
                        <th>
                            Receipt Code
                        </th>
                        <th>
                            Type Ticket Name
                        </th>
                        <th>
                            User Name
                        </th>
                        <th>
                            Receipt Total
                        </th>
                        <th>
                            Receipt Status
                        </th>
                        <th class="text-right">
                        </th>
                        </thead>
                        <tbody class="text-center">
                        @foreach($all_receipt as $receipt)
                            <tr>
                                <td>
                                    {{$receipt->receipt_code}}
                                </td>
                                <td>
                                    {{$receipt->type_ticket->type_name}}
                                </td>
                                <td>
                                    {{$receipt->user->name}}
                                </td>
                                <td>
                                    {{$receipt->receipt_total}}
                                </td>
                                <td style="color: {{$receipt->subscription->ticket->ticket_status ? 'Green' : 'Red'}};">
                                    {{$receipt->subscription->ticket->ticket_status ? 'Valid' : 'Invalid'}}
                                </td>

                                <td class="text-right">
                                    <a href="{{url('/receipt-detail/'.$receipt->id)}}"><i class="nc-icon nc-alert-circle-i"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$all_receipt->appends(request()->all())->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
