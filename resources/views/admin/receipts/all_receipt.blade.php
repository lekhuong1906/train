@extends('admin.admin_layout')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> List Of Receipt</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
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
                            Payment Status
                        </th>
                        <th class="text-right">
                        </th>
                        </thead>
                        <tbody>
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
                                <td class="text-center"><i class="nc-icon nc-check-2 text-success"></i></td>

                                <td class="text-right">
                                    <a href="{{url('/receipt-detail/'.$receipt->id)}}"><i class="nc-icon nc-alert-circle-i"></i></a>
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
