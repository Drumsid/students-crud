@extends('layouts.app')

@section('content')
    <h1>Index students</h1>
    @forelse ($students as $student)
        <li>{{ $student->fullName }}</li>
    @empty
        <p>No students</p>
    @endforelse

@endsection
