@extends('pages.layout')
@section('content')
    <style>
        .profile {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.2);
            margin: 50px auto;
            max-width: 1000px;
            padding: 30px;
        }

        .profile h1 {
            color: #22b3c1;
            margin-bottom: 30px;
        }

        .profile img {
            border-radius: 50%;
            max-width: 150px;
        }

        .profile p {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .profile .btn {
            background-color: #22b3c1;
            border: none;
            color: white;
            font-weight: bold;
            padding: 10px 20px;
        }

        .profile .btn:hover {
            background-color: #1a919e;
        }
    </style>

    <div class="container">
        <div class="row">
            <div class="profile">
                <form>
                    <div class="text-center">
                        <img src="https://via.placeholder.com/150" alt="Profile Picture">
                    </div>
                    <h1 class="text-center">John Doe</h1>
                    <hr>
                    <p>Age: 30</p>
                    <p>Occupation: Web Developer</p>
                    <p>Email: john.doe@example.com</p>
                    <p>Phone: (555) 555-5555</p>
                    <button type="button" class="btn btn-primary">Edit Profile</button>
                </form>
            </div>
        </div>
    </div>
@endsection
