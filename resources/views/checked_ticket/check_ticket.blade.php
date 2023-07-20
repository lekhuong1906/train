<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        Checked Ticket
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />

    <!-- CSS Files -->
    <link href="{{asset('public/backend/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/backend/assets/css/paper-dashboard.css?v=2.0.1')}}" rel="stylesheet" />

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!--  Toastr  -->
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <style>
        body{
            background-color: #fffcf5;
            display: flex;
            align-content: center;
            align-items: center;
            height: 100vh;
        }
        .container{
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .container label, .container input, .container button{
            margin-bottom: 10px;
        }

        form{
            width: 80%;
            align-items: center;
        }
        label {
            text-align: center;
            margin-bottom: 10px; /* Khoảng cách giữa label và input */
            margin-right: 30px;
        }

        input {
            padding: 8px 12px;
            border: 1px solid #ccc;
            width: 50%;
            border-radius: 4px;
            margin-bottom: 10px; /* Khoảng cách giữa các input */
            margin-right: 30px;
        }

        button {
            padding: 8px 16px;
            background-color: #66615b;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="container">
    <form method="post" action="{{url('/submit-checked')}}" class="row">
        @csrf

        <label for="ticket_code">Ticket Code</label>
        <input type="text" name="ticket_code">

        <button type="submit" name="check_ticket">Check</button>
    </form>
</div>

@include('session_notify.get_notify')

</body>
</html>

