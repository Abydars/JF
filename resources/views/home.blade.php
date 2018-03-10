@extends('layouts.single')

@section('style')
    <style>
        body {
            background-color: #16253c;
        }
    </style>
@endsection

@section('content')
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
            @if(!$is_user_logged_in)
                <div class="col-lg-4 col-md-4 col-xs-12 mt-xl mb-xl">
                    <!-- START panel-->
                    <div class="panel panel-dark panel-flat mb-lg">
                        <div class="panel-body">
                            @include('layouts.login')
                        </div>
                    </div>
                    <!-- END panel-->
                </div>
            @endif
        </div>
    </div>
@endsection
