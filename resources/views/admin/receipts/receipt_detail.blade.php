@extends('admin.admin_layout')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-6 ml-auto mr-auto">
                <div class="card card-upgrade">
                    <div class="card-header text-center">
                        <h3 class="card-title">Receipt Detail</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-upgrade">
                            <table class="table">
                                <thead>

                                </thead>
                                <tbody>
                                <tr>
                                    <td>Receipt Code</td>
                                    <td class="text-left">{{$receipt->receipt_code}}</td>
                                </tr>
                                <tr>
                                    <td>User</td>
                                    <td class="text-left">{{$receipt->user->name}}</td>
                                </tr>
                                <tr>
                                    <td>Identity Card</td>
                                    <td class="text-left">{{$receipt->user->identity_card}}</td>
                                </tr>
                                <tr>
                                    <td>User Phone</td>
                                    <td class="text-left">{{$receipt->user->phone}}</td>
                                </tr>
                                <tr>
                                    <td>User Email</td>
                                    <td class="text-left">{{$receipt->user->email}}</td>
                                </tr>
                                <tr>
                                    <td>Type Ticket</td>
                                    <td class="text-left">{{$receipt->type_ticket->type_name}}</td>
                                </tr>
                                <tr>
                                    <td>Receipt Total</td>
                                    <td class="text-left">{{$receipt->receipt_total}}</td>
                                </tr>
                                <tr>
                                    <td>Payment Status</td>
                                    @if($receipt->subscription->stripe_status)
                                        <td class="text-left"><i class="nc-icon nc-check-2 text-success"></i></td>
                                    @else
                                        <td class="text-left"><i class="nc-icon nc-simple-remove text-danger"></i></td>
                                    @endif
                                </tr>
                                <tr>
                                    <td><h6>Receipt Status</h6></td>
                                    <td class="text-left" style="color: {{$receipt->subscription->ticket->ticket_status ? 'Green' : 'Red'}}">
                                        {{$receipt->subscription->ticket->ticket_status ? 'Valid' : 'Invalid'}}
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="text-left">
                                        <a target="_blank" href="#" class="btn btn-round btn-primary">Export</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
