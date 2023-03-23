@extends('pages.layout')
@section('content')
    <div class="weekly-offers">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading text-center">
                        <h2>Book Train Tickets</h2>
                        <p>Choose Ticket You Want To Buy</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-weekly-offers owl-carousel">
                        @foreach($all_type_ticket as $type_ticket)
                            @if($type_ticket->type_status)
                                <div class="item">
                                    <div class="thumb">
                                        <img src="{{asset('public/frontend/assets/images/offers-01.jpg')}}" alt="">
                                        <div class="text">
                                            <h4>{{$type_ticket->type_name}}<br><span><i class="fa fa-users"></i> 234 Check Ins</span>
                                            </h4>
                                            <h6>{{number_format($type_ticket->type_price). 'vnd'}}<br><span>/person</span></h6>
                                            <div class="line-dec"></div>
                                            <ul>
                                                <li>Deal Includes:</li>
                                                <li>
                                                    <i class="fa fa-taxi"></i>Description: {{''.$type_ticket->type_description}}
                                                </li>
                                                <li><i class="fa fa-plane"></i>Total day: {{''.$type_ticket->total_day}}
                                                </li>
                                                <li>
                                                    <i class="fa fa-building"></i>Status: {{''.$type_ticket->type_status}}
                                                </li>
                                            </ul>
                                            <div class="main-button">
                                                <a href="{{url('/create-receipt/'.$type_ticket->id)}}">Payment Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
