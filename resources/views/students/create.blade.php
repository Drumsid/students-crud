@extends('layouts.app')

@section('content')
    <h1>Create student</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route("students.store") }}">
        @csrf
        <div class="mb-3">
            <label for="fullName" class="form-label">Student name</label>
            <input type="text"
                   name="fullName" class="form-control @error('fullName') is-invalid @enderror"
                   id="fullName" value="{{ old("fullName") }}">
            <label for="course" class="form-label">Student course</label>
            <input type="text"
                   name="course" class="form-control @error('course') is-invalid @enderror"
                   id="course" value="{{ old("course") }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
