<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('public/backend/assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('public/backend/assets/img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Admin Page
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{asset('public/backend/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/backend/assets/css/paper-dashboard.css?v=2.0.1')}}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
{{--    <link href="{{asset('public/backend/assets/demo/demo.css')}}" rel="stylesheet" />--}}
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!--  Toastr  -->
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <!--ChartJs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


</head>

<body class="">
<div class="wrapper ">
    @include('admin.dashboard.sidebar')
    <div class="main-panel">
        @include('admin.dashboard.navbar')
        <div class="content">
            @yield('content')
        </div>
        @include('admin.dashboard.footer')

    </div>
</div>

<script>
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

<!--   Core JS Files   -->
<script src="{{asset('public/backend/assets/js/core/jquery.min.js')}}"></script>
<script src="{{asset('public/backend/assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('public/backend/assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('public/backend/assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQgL5q88XL5tqLiDIWmqu88xB4lp_QDiY&callback=initMap"></script>
<!-- Chart JS -->
<script src="{{asset('public/backend/assets/js/plugins/chartjs.min.js')}}"></script>
<!--  Notifications Plugin    -->
<script src="{{asset('public/backend/assets/js/plugins/bootstrap-notify.js')}}"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="public/backend/assets/js/paper-dashboard.min.js" type="text/javascript"></script>

{{--<script src="{{asset('public/backend/assets/js/paper-dashboard.min.js?v=2.0.1')}}" type="text/javascript"></script>--}}
</body>

</html>
