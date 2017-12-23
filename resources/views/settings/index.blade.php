@extends('layouts.admin')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <h4>Quiz Settings</h4>
            <br/>
            {!! Form::open(['url' => ['settings'], 'role' => 'form', 'method' => 'POST', 'novalidate' => ' ', 'class' => 'mb-lg']) !!}
            {{ csrf_field() }}
            @if($error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endif
            <fieldset>
                <div class="clearfix">
                    <div class="checkbox c-checkbox pull-left mt0">
                        <label>
                            {!! Form::checkbox('is_quiz_open', true, \App\SystemSetting::get('is_quiz_open'), ['required']) !!}
                            <span class="fa fa-check"></span>Open quiz
                        </label>
                    </div>
                </div>
                <div class="clearfix">
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
                    <label for="quiz_date" class="col-sm-2 control-label">Quiz Date</label>
                    <div class="col-sm-10">
                        <div data-format="MM/YYYY"
                             class="datetimepicker input-group date">
                            {!! Form::text('quiz_date', \App\SystemSetting::get('quiz_date'), ['id' => 'quiz_date', 'placeholder' => 'dd/mm/yyyy', 'autocomplete' => 'off', 'required', 'class' => 'form-control']) !!}
                            <span class="input-group-addon">
                                    <span class="fa fa-calendar"></span>
                                 </span>
                        </div>
                        <span class="help-block">UTC Timezone</span>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group">
                    <label for="quiz_time" class="col-sm-2 control-label">Quiz Time</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            {!! Form::text('quiz_time', \App\SystemSetting::get('quiz_time'), ['id' => 'quiz_time', 'placeholder' => '00:00', 'autocomplete' => 'off', 'required', 'class' => 'form-control']) !!}
                            <span class="input-group-addon">
                                <span class="fa fa-clock-o"></span>
                            </span>
                        </div>
                        <span class="help-block">UTC Timezone (24 hour format)</span>
                    </div>
                </div>
            </fieldset>
            <button type="submit" class="btn btn-block btn-primary mt-lg wd-auto">Save changes</button>
            {!! Form::close() !!}
        </div>
    </div>
@endsection