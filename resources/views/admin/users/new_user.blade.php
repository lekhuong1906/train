@extends('admin.admin_layout')
@section('content')
    <div class="row-cols-auto container-fluid">
        <form action="{{url('/add-user')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">User Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Your Name">
            </div>
            <div class="form-group">
                <label for="email">User Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter Your Email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter Password ">
            </div>
            <div class="form-group">
                <label for="identity_card">Identity Card</label>
                <input type="text" class="form-control" name="identity_card" placeholder="Enter Your Identity Card">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" name="phone" placeholder="Enter Your Phone">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" placeholder="Enter Your Address">
            </div>

            <input type="text" hidden name="level_account" value="1">

            <button class="btn btn-default" type="submit">Submit</button>
        </form>
    </div>
@endsection
