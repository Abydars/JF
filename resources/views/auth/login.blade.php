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
        <div class="block-center wd-xxl mt-xl">
            <!-- START panel-->
            <div class="panel panel-dark panel-flat">
                <div class="panel-body">
                    @include('layouts.login')
                </div>
            </div>
            <!-- END panel-->
        </div>
    </div>
@endsection
