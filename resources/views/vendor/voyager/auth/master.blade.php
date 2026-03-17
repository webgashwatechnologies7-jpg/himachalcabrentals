<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Kashmir Trip Booking') }}</title>
    <meta name="keywords" content="Kashmir Trip Booking"/>
    <meta name="description" content="Kashmir Trip Booking">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('public/favicon.ico')}}">
    <!-- Styles -->
    <link
        href="https://fonts.googleapis.com/css2?family=Dosis:wght@200;300;400;500;523;600;700;800&amp;family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/css/admin/vendor.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/admin/app.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/admin/auth.css')}}">
    <style>
        .box-shadow {
            -webkit-box-shadow: 2px 1px 11px -6px rgba(0, 0, 0, 0.75);
            -moz-box-shadow: 2px 1px 11px -6px rgba(0, 0, 0, 0.75);
            box-shadow: 2px 1px 11px -6px rgba(0, 0, 0, 0.75);
        }
        .login-page-9{
            background-color: rgba(245, 90, 7, 0.58);
        }
    </style>
</head>
<body>
<div id="app" class="login-page login-page-9">
    <div class="wrapper">
        <div class="panel">
            @yield('content')
        </div>
    </div>
</div>
<!-- Scripts -->
<script src="{{asset('public/js/admin/vendor.js')}}"></script>
<script src="{{asset('public/js/admin/g-app.js')}}"></script>
</body>
</html>
