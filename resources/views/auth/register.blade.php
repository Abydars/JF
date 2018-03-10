@extends('layouts.single_auth')

@section('style')
    <style>
        body {
            background-color: #16253c;
        }
    </style>
@endsection

@section('content')

    {!! Form::open(['url'=>['register'], 'role'=>'form', 'method'=>'POST', 'data-parsley-validate'=>' ', 'novalidate'=>' ', 'class'=>'mb-lg']) !!}
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-6">
            <div class="form-group has-feedback{{ $errors->has('first_name') ? ' has-error' : '' }}">
                <label for="signup_first_name" class="text-muted">First Name</label>
                {!! Form::text('first_name', old('first_name'), ['id'=>'signup_first_name', 'placeholder'=>'First Name', 'autocomplete'=>'off', 'required', 'class'=>'form-control']) !!}
                <span class="fa fa-user form-control-feedback text-muted"></span>
                @if ($errors->has('first_name'))
                    <ul class="parsley-errors-list filled">
                        <li class="parsley-required">{{ $errors->first('first_name') }}</li>
                    </ul>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group has-feedback{{ $errors->has('last_name') ? ' has-error' : '' }}">
                <label for="signup_last_name" class="text-muted">Last Name</label>
                {!! Form::text('last_name', old('last_name'), ['id'=>'signup_last_name', 'placeholder'=>'Last Name', 'autocomplete'=>'off', 'required', 'class'=>'form-control']) !!}
                <span class="fa fa-user form-control-feedback text-muted"></span>
                @if ($errors->has('last_name'))
                    <ul class="parsley-errors-list filled">
                        <li class="parsley-required">{{ $errors->first('last_name') }}</li>
                    </ul>
                @endif
            </div>
        </div>
    </div>
    <div class="form-group has-feedback{{ $errors->has('username') ? ' has-error' : '' }}">
        <label for="signup_username" class="text-muted">Username</label>
        {!! Form::text('username', old('username'), ['id'=>'signup_username', 'placeholder'=>'Enter Username', 'autocomplete'=>'off', 'required', 'class'=>'form-control']) !!}
        <span class="fa fa-user form-control-feedback text-muted"></span>
        @if ($errors->has('username'))
            <ul class="parsley-errors-list filled">
                <li class="parsley-required">{{ $errors->first('username') }}</li>
            </ul>
        @endif
    </div>
    <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="signup_email" class="text-muted">Email Address</label>
        {!! Form::text('email', old('email'), ['id'=>'signup_email', 'placeholder'=>'Enter Email', 'autocomplete'=>'off', 'required', 'class'=>'form-control']) !!}
        <span class="fa fa-envelope form-control-feedback text-muted"></span>
        @if ($errors->has('email'))
            <ul class="parsley-errors-list filled">
                <li class="parsley-required">{{ $errors->first('email') }}</li>
            </ul>
        @endif
    </div>
    <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="signup_password" class="text-muted">Password</label>
        {!! Form::password('password', ['id'=>'signup_password', 'placeholder'=>'Password', 'autocomplete'=>'off', 'required', 'class'=>'form-control']) !!}
        <span class="fa fa-lock form-control-feedback text-muted"></span>
        @if ($errors->has('password'))
            <ul class="parsley-errors-list filled">
                <li class="parsley-required">{{ $errors->first('password') }}</li>
            </ul>
        @endif
    </div>
    <div class="form-group has-feedback">
        <label for="signup_password_confirm" class="text-muted">Retype Password</label>
        {!! Form::password('password_confirmation', ['id'=>'signup_password_confirm', 'placeholder'=>'Retype Password', 'autocomplete'=>'off', 'required', 'data-parsley-equalto'=>'#signup_password', 'class'=>'form-control']) !!}
        <span class="fa fa-lock form-control-feedback text-muted"></span>
    </div>
    <div class="form-group has-feedback{{ $errors->has('phone') ? ' has-error' : '' }}">
        <label for="signup_phone" class="text-muted">Phone</label>
        {!! Form::text('phone', old('phone'), ['id'=>'signup_phone', 'placeholder'=>'Enter Phone', 'autocomplete'=>'off', 'required', 'class'=>'form-control']) !!}
        <span class="fa fa-phone form-control-feedback text-muted"></span>
        @if ($errors->has('phone'))
            <ul class="parsley-errors-list filled">
                <li class="parsley-required">{{ $errors->first('phone') }}</li>
            </ul>
        @endif
    </div>
    <div class="form-group has-feedback{{ $errors->has('country') ? ' has-error' : '' }}">
        <label for="signup_country" class="text-muted">Country</label>
        {!! Form::select('country', \Illuminate\Support\Facades\Config::get('constants.countries'), old('country'), ['id'=>'signup_country', 'placeholder'=>'Select Country', 'autocomplete'=>'off', 'required', 'class'=>'form-control']) !!}
        @if ($errors->has('country'))
            <ul class="parsley-errors-list filled">
                <li class="parsley-required">{{ $errors->first('country') }}</li>
            </ul>
        @endif
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group has-feedback{{ $errors->has('city') ? ' has-error' : '' }}">
                <label for="signup_city" class="text-muted">City</label>
                {!! Form::text('city', old('city'), ['id'=>'signup_city', 'placeholder'=>'Enter City', 'autocomplete'=>'off', 'required', 'class'=>'form-control']) !!}
                @if ($errors->has('city'))
                    <ul class="parsley-errors-list filled">
                        <li class="parsley-required">{{ $errors->first('city') }}</li>
                    </ul>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group has-feedback{{ $errors->has('state') ? ' has-error' : '' }}">
                <label for="signup_state" class="text-muted">State</label>
                {!! Form::text('state', old('state'), ['id'=>'signup_state', 'placeholder'=>'Enter State', 'autocomplete'=>'off', 'required', 'class'=>'form-control']) !!}
                @if ($errors->has('state'))
                    <ul class="parsley-errors-list filled">
                        <li class="parsley-required">{{ $errors->first('state') }}</li>
                    </ul>
                @endif
            </div>
        </div>
    </div>
    <div class="clearfix">
        <div class="checkbox c-checkbox pull-left mt0">
            <label>
                <input type="checkbox" value="" required name="agreed">
                <span class="fa fa-check"></span>I agree with the <a href="#">terms</a>
            </label>
        </div>
    </div>
    <button type="submit" class="btn btn-block bg-info mt-lg">Create account</button>
    {!! Form::close() !!}
    <p class="pt-lg text-center">Have an account?</p><a href="{{ url('/login') }}"
                                                        class="btn btn-block btn-default">Sign
        In</a>
@endsection
