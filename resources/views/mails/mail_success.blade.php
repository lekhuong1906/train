<html lang="en">
<head>
    <style>
        body{
            font-family: "Montserrat", "Helvetica Neue", Arial, sans-serif;
            text-align: center;
        }
    </style>
</head>
<h1 style="color: #0dcaf0">You booking train success. </h1>
<h2>This is your ticket information: </h2>
<b>Ticket Code:</b> {{$detail['ticket_code']}} <br>
<b>Day Start:</b> {{$detail['day_start']}} <br>
<b>Day End:</b> {{$detail['day_end']}} <br>
<hr width="30%">
{{$detail['qrCode']}}
</html>
