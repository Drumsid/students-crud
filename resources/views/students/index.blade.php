@extends('layouts.app')

@section('content')
    <h1>No ajax students index Page</h1>
    <a class="btn btn-primary mt-5 mb-5" href="{{ route("students.create") }}" role="button">Create student</a>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th scope="col">№</th>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Course</th>
            <th scope="col">Data</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($students as $key => $student)
            <tr>
                <th>{{ $key + 1 }}</th>
                <th>{{ $student->id }}</th>
                <td>{{ $student->fullName }}</td>
                <td>{{ $student->course }}</td>
                <td>{{ $student->updated_at }}</td>
                <td style="white-space: nowrap; ">
                    <a class="btn btn-primary btn-sm float-left mr-1"
                       href="{{ route("students.show", ['student' => $student->id]) }}"
                    title="show">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </a>
                    <a class="btn btn-primary btn-sm float-left mr-1"
                       href="{{ route("students.edit", ['student' => $student->id]) }}"
                    title="edit">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                    <form action="{{ route('students.destroy', $student) }}" method="post"
                          class="float-left d-inline-block" title="Удалить">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Подтвердите удаление')">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <td>No students</td>
        @endforelse

        </tbody>
    </table>

@endsection
