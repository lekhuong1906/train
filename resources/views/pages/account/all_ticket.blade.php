@extends('pages.layout')
@section('content')
    <div class="more-about">
        <div class="container">
            <div class="row">
                @for($i=0;$i<12;$i++)
                    <div class="col-lg-4" style="overflow:hidden">

                        <div class="info-item">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h4>AHJVNWIEHKG</h4>
                                    <span>End: 20/12/2023</span><br>
                                    <span>Status: Active</span><br>
                                    <span>Date: 16/03/2024</span><br>
                                </div>
                                <div class="col-lg-4">
                                    <a href="{{url('/qrcode')}}">
                                        <img src="{{asset('public/frontend/assets/images/qr-01.png')}}"
                                             style="width: auto; height: 100px;">
                                        </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
    </div>
@endsection
