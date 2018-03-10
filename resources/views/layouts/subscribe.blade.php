<div class="panel bg-transparent">
    <div class="panel-body p0">
        <h3>Subscribe Our Updates</h3>
        {!! Form::open(['route' => ['public.subscribe'], 'role' => 'form', 'method' => 'POST', 'data-parsley-validate' => '', 'novalidate' => ' ', 'class' => 'mb-lg subscription-form', 'data-success-element' => '#subscribe-success', 'data-error-element' => '#subscribe-error']) !!}
        <div class="text-danger" id="subscribe-error"></div>
        <div class="text-success" id="subscribe-success"></div>
        {!! Form::email('email', false, ['id' => 'input-email', 'placeholder' => 'Enter your email', 'autocomplete' => 'off', 'required', 'class' => 'form-control']) !!}
        <button type="submit" class="btn btn-danger mt-lg">Subscribe</button>
        {!! Form::close() !!}
    </div>
</div>