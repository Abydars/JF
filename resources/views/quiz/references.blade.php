@extends('layouts.admin')

@section('top')

@endsection

@section('content')
    <div class="row">
        @foreach($quizzes as $quiz)
            <div class="col-md-3">
                <div class="panel widget">
                    <div class="panel-body">
                        <h4>{{ $quiz->name }}</h4>
                    </div>
                </div>
            </div>
    @endforeach
@endsection