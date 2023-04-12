@extends('admin.admin_layout')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md">
                <div class="card card-user">
                    <div class="image">
                        <img src="{{asset('public/backend/assets/img/background.png')}}" alt="..." width="100%">
                    </div>
                    <div class="card-body">
                        <div class="author">
                            <a href="#">
                                <img class="avatar border-gray" src="{{asset('public/backend/assets/img/avt.jpg')}}"
                                     alt="...">
                                <h5 class="title">{{$user->name}}</h5>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card card-user">
                    <div class="card-header">
                        <h5 class="card-title">Edit Profile</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{url('/update-profile/'.$user->id)}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="name" class="form-control"
                                               placeholder="Enter Your Name" value="{{$user->name}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" name="email" class="form-control" value="{{$user->email}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Identity Card</label>
                                        <input type="text" name="card" class="form-control"
                                               placeholder="Enter Your Card" value="{{$user->card}}">
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" name="phone" class="form-control"
                                               placeholder="Enter Your Phone" value="{{$user->phone}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="address" class="form-control"
                                               placeholder="Enter Your Address" value="{{$user->address}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="update ml-auto mr-auto">
                                    <button type="submit" class="btn btn-primary btn-round" >Update Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
