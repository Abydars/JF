@extends('layouts.admin')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <h4>Quiz Settings</h4>
            <br/>
            {!! Form::open(['route' => ['settings.index'], 'role' => 'form', 'method' => 'POST', 'novalidate' => ' ', 'class' => 'mb-lg']) !!}
            {{ csrf_field() }}
            @if($error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endif
            @if($success)
                <div class="alert alert-success">{{ $success }}</div>
            @endif
            <fieldset>
                <div class="clearfix col-lg-12">
                    <div class="checkbox c-checkbox pull-left mt0">
                        <label>
                            {!! Form::checkbox('is_quiz_open', true, \App\SystemSetting::get('is_quiz_open'), ['required']) !!}
                            <span class="fa fa-check"></span>Open quiz
                        </label>
                    </div>
                </div>
                <div class="clearfix col-lg-12">
                    <div class="checkbox c-checkbox pull-left mt0">
                        <label>
                            {!! Form::checkbox('is_pre_registration_open', true, \App\SystemSetting::get('is_pre_registration_open'), ['required']) !!}
                            <span class="fa fa-check"></span>Allow Pre-registration
                        </label>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group">
                    <label for="quiz_date" class="col-sm-2 control-label">Quiz Date/Time</label>
                    <div class="col-sm-10">
                        <div data-format="YYYY-MM-DD H:m:s" class="datetimepicker input-group date">
                            {!! Form::text('quiz_date', \App\SystemSetting::get('quiz_date'), ['id' => 'quiz_date', 'placeholder' => 'dd/mm/yyyy', 'autocomplete' => 'off', 'required', 'class' => 'form-control']) !!}
                            <span class="input-group-addon">
                                    <span class="fa fa-calendar"></span>
                                 </span>
                        </div>
                        <span class="help-block">UTC Timezone</span>
                    </div>
                </div>
            </fieldset>
            <button type="submit" class="btn btn-block btn-primary mt-lg wd-auto">Save changes</button>
            {!! Form::close() !!}
        </div>
    </div>
@endsection