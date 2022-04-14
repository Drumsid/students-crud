@extends('layouts.app')

@section('content')
    <h1>Hello, world!</h1>
    <a class="btn btn-primary mt-5 mb-5" href="{{ route("students.create") }}" role="button">Create student</a>

@endsection
