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
    <!-- Bootstrap JavaScript library -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-..."></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!--Notify with Sweetaler -->
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>


    <!--  Toastr  -->
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <!--
    -->
</head>

<body>

@include('sweetalert::alert')

@include('pages.homes.header')
@yield('content')
@include('pages.homes.footer')


<!-- Scripts -->
<!-- Bootstrap core JavaScript -->
<script src="{{asset('public/frontend/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('public/frontend/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

<script src="{{asset('public/frontend/assets/js/isotope.min.js')}}"></script>
<script src="{{asset('public/frontend/assets/js/owl-carousel.js')}}"></script>
<script src="{{asset('public/frontend/assets/js/wow.js')}}"></script>
<script src="{{asset('public/frontend/assets/js/tabs.js')}}"></script>
<script src="{{asset('public/frontend/assets/js/popup.js')}}"></script>
<script src="{{asset('public/frontend/assets/js/custom.js')}}"></script>

<!--Map Api -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQgL5q88XL5tqLiDIWmqu88xB4lp_QDiY&callback=initMap"></script>

<script>
    $(".option").click(function () {
        $(".option").removeClass("active");
        $(this).addClass("active");
    });

    /* GET NOTIFICATION */
    $(document).ready(function () {
        @if (!empty($errors->all()))
        @foreach ($errors->all() as $error)
        toastr.error("{{$error}}")
        @endforeach
            @endif

            @if(Session::has('message'))
            toastr.options =
            {
                "closeButton": true,
                "progressBar": true,
            }
        toastr.success("{{ session('message') }}");
        @endif

            @if(Session::has('error'))
            toastr.options =
            {
                "closeButton": true,
                "progressBar": true
            }
        toastr.error("{{ session('error') }}");
        @endif

            @if(Session::has('info'))
            toastr.options =
            {
                "closeButton": true,
                "progressBar": true
            }
        toastr.info("{{ session('info') }}");
        @endif

            @if(Session::has('warning'))
            toastr.options =
            {
                "closeButton": true,
                "progressBar": true
            }
        toastr.warning("{{ session('warning') }}");
        @endif
    })
</script>
</body>

</html>
