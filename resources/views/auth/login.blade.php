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
        <div class="col-lg-8">

        </div>
        <div class="col-lg-4 col-md-4 col-xs-12 mt-xl mb-xl">
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
