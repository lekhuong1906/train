<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">

    <title>Train Ticket</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('public/frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{asset('public/frontend/assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/assets/css/templatemo-woox-travel.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/assets/css/owl.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/assets/css/animate.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <!--  Toastr  -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!--
    -->
</head>

<body>


@include('pages.homes.header')
@include('pages.session.get_session')
@yield('content')
@include('pages.homes.footer')


<!-- Scripts -->
<!-- Bootstrap core JavaScript -->
<script src="{{asset('public/frontend/vendor/jquery/jquery.min.js"')}}></script>
<script src="{{asset('public/frontend/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

<script src="{{asset('public/frontend/assets/js/isotope.min.js')}}"></script>
<script src="{{asset('public/frontend/assets/js/owl-carousel.js')}}"></script>
<script src="{{asset('public/frontend/assets/js/wow.js')}}"></script>
<script src="{{asset('public/frontend/assets/js/tabs.js')}}"></script>
<script src="{{asset('public/frontend/assets/js/popup.js')}}"></script>
<script src="{{asset('public/frontend/assets/js/custom.js')}}"></script>

<script>
    $(".option").click(function () {
        $(".option").removeClass("active");
        $(this).addClass("active");
    });
</script>

</body>

</html>
