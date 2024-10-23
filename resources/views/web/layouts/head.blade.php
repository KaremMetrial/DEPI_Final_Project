<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <title>
        @yield('title',"FoodPark Restaurant")
    </title>
{{--    <link rel="stylesheet" href="{{ asset('build/assets/app-Dmdv8mED.css') }}">--}}
    <link rel="icon" type="image/png" href="{{ asset('web/images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('web/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/venobox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/jquery.exzoom.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/toastr.min.css') }}">
    {{--    <link rel="stylesheet" href="{{ asset('web/css/custom.css') }}">--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @stack('web-css')
    <!-- <link rel="stylesheet" href="css/rtl.css"> -->
</head>

<body>
<div class="overlay-container">
    <div class="overlay">
        <span class="loader"></span>
    </div>
</div>
