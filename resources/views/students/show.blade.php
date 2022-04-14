@extends('layouts.app')

@section('content')
    <h1>Show student</h1>
    <p>Student Name: {{ $student->fullName }}</p>
    <p>Student Course: {{ $student->course }}</p>
    <p>Student Data: {{ $student->updated_at }}</p>

    <a class="btn btn-primary mt-5 mb-5"
       href="{{ route("students.edit", ["student" => $student->id]) }}"
       role="button">Edite student</a>

@endsection
