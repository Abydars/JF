<div class="panel widget">
    <div class="panel-body">
        <h3 class="text-center">Subscribe Our Updates</h3>
        {!! Form::open(['route' => ['public.subscribe'], 'role' => 'form', 'method' => 'POST', 'data-parsley-validate' => '', 'novalidate' => ' ', 'class' => 'mb-lg subscription-form', 'data-success-element' => '#subscribe-success', 'data-error-element' => '#subscribe-error']) !!}
        <div class="text-danger text-center" id="subscribe-error"></div>
        <div class="text-success text-center" id="subscribe-success"></div>
        {!! Form::email('email', false, ['id' => 'input-email', 'placeholder' => 'Enter your email', 'autocomplete' => 'off', 'required', 'class' => 'form-control']) !!}
        <button type="submit" class="btn btn-block btn-danger mt-lg">Subscribe</button>
        {!! Form::close() !!}
    </div>
</div>