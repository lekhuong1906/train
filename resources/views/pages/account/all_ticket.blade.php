@extends('pages.layout')
@section('content')
    <div class="more-about">
        <div class="container">
            <div class="row">
                {{--<div class="filter">
                    <button type="button" class="btn btn-secondary">Button 1</button>
                    <button type="button" class="btn btn-secondary">Button 2</button>
                    <button type="button" class="btn btn-secondary">Button 3</button>
                </div>--}}
                <div class="row">
                    @foreach($all_ticket as $ticket)
                        <div class="col-lg-4" style="overflow:hidden">
                            <div class="info-item">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <h4>{{$ticket->ticket_code}}</h4>
                                        <span>Day Start: {{$ticket->day_start}}</span><br>
                                        <span>Day End: {{$ticket->day_end}}</span><br>
                                        <span style="color: {!! $ticket->ticket_status ? 'Green' : 'Red' !!}">
                                        Status: {!! $ticket->ticket_status ? 'Valid' : 'Invalid' !!}
                                    </span><br>
                                    </div>
                                    <div class="col-lg-4">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal trigger script -->
    <script>
        var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
            keyboard: false
        })

        $(document).ready(function(){
            $('#exampleModal').on('shown.bs.modal', function () {
                $('#myInput').trigger('focus')
            })

            // Show the modal on button click
            $('#exampleModal').on('click', function () {
                myModal.show()
            })
        });
    </script>

@endsection
