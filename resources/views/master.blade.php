<!DOCTYPE html>
<html lang="en">
<head>
    <title>The MoonLight Team</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta property="fb:app_id" content="2474525532872947" />

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('data/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('data/css/animate.css')}}">

    <link rel="stylesheet" href="{{asset('data/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('data/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('data/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('data/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('data/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('data/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('data/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('data/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" >
    <style>
        .fa {
            padding: 20px;
            font-size: 15px;
            width: 100px;
            height: 70px;
            text-align: center;
            text-decoration: none;
            margin: 5px 2px;
        }
        .fa:hover {
            opacity: 0.7;
        }
        .fa-facebook {
            background: #3B5998;
            color: white;
        }

        .fa-twitter {
            background: #55ACEE;
            color: white;
        }

        .fa-google {
            background: #dd4b39;
            color: white;
        }
    </style>
    @stack('css')
</head>
<body>
@include('header')
@yield('content')
@include('footer')
<script src="{{asset('data/js/jquery.min.js')}}"></script>
<script src="{{asset('data/js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{asset('data/js/popper.min.js')}}"></script>
<script src="{{asset('data/js/bootstrap.min.js')}}"></script>
<script src="{{asset('data/js/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('data/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('data/js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('data/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('data/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('data/js/aos.js')}}"></script>
<script src="{{asset('data/js/jquery.animateNumber.min.js')}}"></script>
<script src="{{asset('data/js/scrollax.min.js')}}"></script>
{{--<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js')}}"></script>--}}
{{--<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js')}}"></script>--}}
{{--<script src="{{URL::asset('https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false')}}"></script>--}}
{{--<script src="{{asset('data/js/google-map.js')}}"></script>--}}
<script src="{{asset('data/js/main.js')}}"></script>
@stack('js')
</body>
</html>
