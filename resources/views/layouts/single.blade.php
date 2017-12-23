<!DOCTYPE html>
<?php
$navigations = Front::navigations();
$active_navigation = Front::active_navigation();
$user = Front::user();
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>{{ config('app.name') }}</title>

    <!-- =============== STYLES ===============-->
    <link rel="stylesheet" href="{{ asset('/css/vendor.css') }}">

    <link rel="stylesheet" href="{{ asset('/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link id="autoloaded-stylesheet" rel="stylesheet" href="{{ asset('/css/theme-a.css') }}">
    <style>
        .middle-block {
            display: flex;
            align-items: center;
            min-height: 100vh;
        }
    </style>
    @yield('style')
</head>
<body class="">
<div class="wrapper">
    @include ('layouts.single_nav')
    @yield('content')
</div>

<!-- =============== SCRIPTS ===============-->
<script src="{{ asset('/js/vendor.js') }}"></script>
<script src="{{ asset('/js/app.js') }}"></script>
@stack('scripts')
</body>
</html>
