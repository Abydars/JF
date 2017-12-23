@extends('layouts.admin')

@section('content')
    <h4>You are not allowed to access this page.</h4>
    <a href="{{ route('dashboard') }}" class="btn btn-primary">Go to Dashboard</a>
@endsection