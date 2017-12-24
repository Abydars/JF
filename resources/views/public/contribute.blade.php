@extends('layouts.single')

@section('style')
@endsection

@section('content')
    <div class="container">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="mb0">How would you like to contribute?</h3>
            </div>
            <div class="panel-body">
                {!! Form::open(['role' => 'form', 'method' => 'POST', 'novalidate' => ' ', 'class' => 'mb-lg']) !!}
                <fieldset>
                    <div class="form-group">
                        {!! Form::textarea('comments', false, ['id' => 'input-comments', 'placeholder' => 'How and what you can do for this project?', 'autocomplete' => 'off', 'required', 'class' => 'form-control']) !!}
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                        <label>Contact Email</label>
                        {!! Form::email('email', false, ['id' => 'input-email', 'autocomplete' => 'off', 'required', 'class' => 'form-control']) !!}
                    </div>
                </fieldset>
                {!! Form::hidden('pg_action', 'contribute') !!}
                <button type="submit" class="btn btn-block btn-primary mt-lg wd-auto">Submit</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
