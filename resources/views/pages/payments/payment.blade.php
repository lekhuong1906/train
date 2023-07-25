@extends('pages.layout')
@section('content')
    <div class="reservation-form">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form id="reservation-form" name="gs" method="post" role="search" action="{{route('payment')}}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <h4>Payment<em> Receipt</em></h4>
                            </div>
                            <div class="col-md-12">
                                <label for="card_number" class="form-label">Card Number</label>
                                <input type="number" name="card_number"  placeholder="xxx xxxx xxxx xxxx">
                            </div>
                            <div class="col-md-12">
                                <label for="name" class="form-label">Your Name</label>
                                <input type="text"  placeholder="NGUYEN VAN A">
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <label for="exp_date" class="form-label">Check In Date</label>
                                    <input type="month" name="exp_date" class="date" >
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <label for="cvv" class="form-label">Cvv</label>
                                    <input type="text" name="cvv" class="cvv" placeholder="192"
                                           autocomplete="on" >
                                </fieldset>
                            </div>
                            <input hidden name="receiptId" value="{{$receiptId}}">

                            <div class="main-button">
                                    <button type="submit" class="main-button">Payment</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- <div class="col-lg-12">
                  <div id="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12469.776493332698!2d-80.14036379941481!3d25.907788681148624!2m3!1f357.26927939317244!2f20.870722720054623!3f0!3m2!1i1024!2i768!4f35!3m3!1m2!1s0x88d9add4b4ac788f%3A0xe77469d09480fcdb!2sSunny%20Isles%20Beach!5e1!3m2!1sen!2sth!4v1642869952544!5m2!1sen!2sth" width="100%" height="450px" frameborder="0" style="border:0; border-top-left-radius: 23px; border-top-right-radius: 23px;" allowfullscreen=""></iframe>
                  </div>
                </div> -->
            </div>
        </div>
    </div>
@endsection
