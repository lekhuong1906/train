@extends('pages.layout')
@section('content')
    <style>
        .profile {
            background-color: #fff;
            border-radius: 23px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.15);
            text-align: center;
            padding: 30px;

        }

        .profile-form h1 {
            color: #22b3c1;
            margin-bottom: 30px;
        }

        .profile-form #profile-form {
            padding: 60px 120px;
            background-color: #f9f9f9;
            border-bottom-right-radius: 23px;
            border-bottom-left-radius: 23px;
        }

        .profile-form #profile-form label {
            font-size: 15px;
            color: #afafaf;
        }

        .profile-form #profile-form input,
        .profile-form #profile-form select {
            width: 100%;
            height: 46px;
            background-color: transparent;
            border-radius: 23px;
            border: 1px solid #e0e0e0;
            padding: 0px 20px;
            cursor: pointer;
            margin-bottom: 30px;
        }

        .profile-form img {
            border-radius: 50%;
            max-width: 150px;
        }

        .profile-form #profile-form button {
            font-size: 14px;
            color: #fff;
            background-color: #22b3c1;
            border: 1px solid #22b3c1;
            padding: 12px 30px;
            width: 100%;
            text-align: center;
            display: inline-block;
            border-radius: 25px;
            font-weight: 500;
            text-transform: capitalize;
            letter-spacing: 0.5px;
            transition: all .3s;
            position: relative;
            overflow: hidden;
        }

        .reservation-form #reservation-form button:hover {
            opacity: 0.8;
        }

    </style>

    <div class="container">
        <div class="profile-form">
            <div class="row">

            </div>
            <div class="row justify-content-md-center">
                <div class="item col-md-12">
                    <form id="profile-form" name="gs" method="post" role="search" action="#">
                        @csrf

                        <div class="row">
                            <div class="text-center">
                                <img src="{{asset('public/frontend/assets/images/avt.png')}}" alt="Profile Picture">
                            </div>
                            <h1 class="text-center">John Doe</h1>
                            <hr>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="name" class="form-label">Your Name</label>
                                <input type="text" name="name" value="NGUYEN VAN A">
                            </div>
                            <div class="col-md-12">
                                <label for="email" class="form-label">Your Email</label>
                                <input type="text" name="email" value="customer_2@gmail.com">
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <label for="identity_card" class="form-label">Your Identity Card</label>
                                    <input type="text" name="identity_card" value="192">
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <label for="phone" class="form-label">Your Phone</label>
                                    <input type="text" name="phone" value="192">
                                </fieldset>
                            </div><div class="col-md-12">
                                <label for="name" class="form-label">Your Address</label>
                                <input type="text"  value="12 Nguyen Thi Minh Khai">
                            </div>

                            <hr/>
                            <div class="main-button">
                                <button type="submit" class="main-button">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
