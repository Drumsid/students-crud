@extends('layouts.app')

@section('content')
    <h1>Edite student</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route("students.update", ["student" => $student->id]) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="fullName" class="form-label">Tag name</label>
            <input type="text"
                   name="fullName"
                   class="form-control @error('fullName') is-invalid @enderror"
                   id="fullName"
                   value="{{ $student->fullName }}">
            <label for="course" class="form-label">Tag name</label>
            <input type="text"
                   name="course"
                   class="form-control @error('course') is-invalid @enderror"
                   id="course"
                   value="{{ $student->course }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

@endsection
