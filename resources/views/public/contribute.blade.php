@extends('layouts.single')

@section('style')
@endsection

@section('content')
    <div class="container">
        <div class="panel">
            <div class="panel-body">

                <ul class="nav nav-tabs">
                    <li class="active"><a href="#contribute" data-toggle="tab" aria-expanded="false">Contribute</a>
                    </li>
                    <li><a href="#donate" data-toggle="tab" aria-expanded="true">Donate</a>
                    </li>
                </ul>

                <div class="tab-content b0">
                    <div id="contribute" class="tab-pane fade active in">
                        <h3>How would you like to contribute?</h3>
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
                    <div id="donate" class="tab-pane fade">
                        <h2 id="paypay">PayPal</h2>
                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                            <input TYPE="hidden" name="cmd" value="_donations">
                            <input TYPE="hidden" name="charset" value="utf-8">
                            <input TYPE="hidden" NAME="return" value="{{ url('') }}">
                            <input TYPE="hidden" NAME="currency_code" value="USD">
                            <input type="hidden" name="business" value="jayinars@gmail.com">
                            <input type="submit" value="Donate via PayPal"
                                   class="btn btn-success"/>
                        </form>
                        <h2 id="bitcoin">Bitcoin</h2>
                        <a href="#" class="btn btn-success">Copy BTC Address</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
