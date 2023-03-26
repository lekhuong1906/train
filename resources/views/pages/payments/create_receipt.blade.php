@extends('pages.layout')
@section('content')

    <div class="reservation-form">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="item col-md-6">
                    <form id="reservation-form" name="gs" method="post" role="search" action="{{url('/save-receipt')}}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <h4>Receipt<em> Information</em></h4>
                            </div>
                            <div class="form-group row">
                                <label for="receipt_code" class="col-sm col-form-label">Receipt Code</label>
                                <div class="col-sm">
                                    <input type="text" readonly class="form-control-plaintext" name="receipt_code"
                                           value="HD{!!($count=\App\Models\Receipt::count())+1;!!}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="type_ticket_id" class="col-sm col-form-label">Type Ticket</label>
                                <div class="col-sm">
                                    <input type="text" readonly class="form-control-plaintext" name="type_ticket_id"
                                           value="{{$type_ticket->id}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="user_id" class="col-sm col-form-label">User</label>
                                <div class="col-sm">
                                    <input type="text" readonly class="form-control-plaintext" name="user_id"
                                           value="{{\Illuminate\Support\Facades\Auth::id()}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="receipt_total" class="col-sm col-form-label">Receipt Total</label>
                                <div class="col-sm">
                                    <input type="text" onsubmit="" readonly class="form-control-plaintext"
                                           name="receipt_total"  value="{{$type_ticket->type_price}}">
                                </div>
                            </div>
                            <hr/>
                            <div class="main-button">
                                <button type="submit" class="main-button">Payment Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

