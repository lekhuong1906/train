@extends('pages.layout')
@section('content')
    <div class="more-about">
        <div class="container">
            <div class="row">
                <div class="row">
                    @foreach($all_ticket as $ticket)
                        <div class="col-lg-4" style="overflow:hidden">
                            <div class="info-item">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <h4 id="ticket_code">{{$ticket->ticket_code}}</h4>
                                        <span>Day Start: {{$ticket->day_start}}</span><br>
                                        <span>Day End: {{$ticket->day_end}}</span><br>
                                        <span style="color: {!! $ticket->ticket_status ? 'Green' : 'Red' !!}">
                                        Status: {!! $ticket->ticket_status ? 'Valid' : 'Invalid' !!}
                                    </span><br>
                                    </div>
                                    <div class="col-lg-4">
                                        <a href="#"  id="qr_detail" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <img src="{{asset('public/frontend/assets/images/qr-01.png')}}"
                                                 style="width: auto; height: 100px;">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body" id="modal_body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary align-items-center" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal trigger script -->
    <script>
        $(document).ready(function (){
            $(".info-item").click(function () {
                let ticket_code = $(this).find("#ticket_code").text();
                $.ajax({
                    url: "/qrcode/" + ticket_code,
                    type: "GET",
                    success: function (data) {
                        $("#modal_body").html('<img src="' + data + '">');
                        $("#exampleModal").modal("show");
                    },
                    error: function (xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            })
        })
    </script>
@endsection
