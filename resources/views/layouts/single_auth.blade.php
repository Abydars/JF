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

        body {
            background-color: #16253c;
        }
    </style>
    @yield('style')
</head>
<body class="full-width">
<div class="wrapper">
    @include ('layouts.single_nav')

    <div class="container">
        <div class="row">
            <div class="col-lg-8 text-white">
                <h1 style="font-size: 60px;">Get Connected to...<br/>JF Network.</h1>
                <p>World-wide Shia Network</p>
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        @include('layouts.subscribe')
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-xs-12 mt-xl mb-xl">
                <!-- START panel-->
                <div class="panel panel-dark panel-flat mb-lg">
                    <div class="panel-body">
                        @yield('content')
                    </div>
                </div>
                <!-- END panel-->
            </div>
        </div>
    </div>

    <footer class="bg-white">
        <div class="container">
            <span>&copy; {{ date('Y') }} - {{ config('app.name') }}</span>
        </div>
    </footer>
</div>

<!-- =============== SCRIPTS ===============-->
<script src="{{ asset('/js/vendor.js') }}"></script>
<script src="{{ asset('/js/app.js') }}"></script>
@stack('scripts')
</body>
</html>
