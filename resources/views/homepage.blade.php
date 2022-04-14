@extends('layouts.app')

@section('content')
    <h1>Hello, world!</h1>
{{--    <a class="btn btn-primary mt-5 mb-5" href="{{ route("students.create") }}" role="button">Create student</a>--}}

    <!-- Button trigger modal -->
{{--    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">--}}
{{--        Launch demo modal--}}
{{--    </button>--}}

{{--    <!-- Modal -->--}}
{{--    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--        <div class="modal-dialog">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}

{{--                    @if ($errors->any())--}}
{{--                        <div>--}}
{{--                            <ul>--}}
{{--                                @foreach ($errors->all() as $error)--}}
{{--                                    <li class="text-danger">{{ $error }}</li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                    <form method="POST" action="{{ route("students.store") }}" id="add-user-form">--}}
{{--                        @csrf--}}
{{--                        <div class="mb-3">--}}
{{--                            <label for="fullName" class="form-label">Student name</label>--}}
{{--                            <input type="text"--}}
{{--                                   name="fullName" class="form-control @error('fullName') is-invalid @enderror"--}}
{{--                                   id="fullName" value="{{ old("fullName") }}">--}}
{{--                            <label for="course" class="form-label">Student course</label>--}}
{{--                            <input type="text"--}}
{{--                                   name="course" class="form-control @error('course') is-invalid @enderror"--}}
{{--                                   id="course" value="{{ old("course") }}">--}}
{{--                        </div>--}}
{{--                        <button type="submit" class="btn btn-primary">Submit</button>--}}

{{--                    </form>--}}
{{--                </div>--}}
{{--                <div class="modal-footer">--}}
{{--                    <button  class="btn btn-primary" onclick="test()">Submit</button>--}}
{{--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <table class="table table-striped table-bordered">--}}
{{--        <thead>--}}
{{--        <tr>--}}
{{--            <th scope="col">#</th>--}}
{{--            <th scope="col">Name</th>--}}
{{--            <th scope="col">Course</th>--}}
{{--            <th scope="col">Data</th>--}}
{{--            <th scope="col">Action</th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--        @forelse ($students as $key => $student)--}}
{{--            <tr>--}}
{{--                <th>{{ $key + 1 }}</th>--}}
{{--                <td>{{ $student->fullName }}</td>--}}
{{--                <td>{{ $student->course }}</td>--}}
{{--                <td>{{ $student->updated_at }}</td>--}}
{{--                <td style="white-space: nowrap; ">--}}
{{--                    <a class="btn btn-primary btn-sm float-left mr-1"--}}
{{--                       href="{{ route("students.show", ['student' => $student->id]) }}"--}}
{{--                       title="show">--}}
{{--                        <i class="fa fa-eye" aria-hidden="true"></i>--}}
{{--                    </a>--}}
{{--                    <a class="btn btn-primary btn-sm float-left mr-1"--}}
{{--                       href="{{ route("students.edit", ['student' => $student->id]) }}"--}}
{{--                       title="edit">--}}
{{--                        <i class="fa fa-pencil" aria-hidden="true"></i>--}}
{{--                    </a>--}}
{{--                    <form action="{{ route('students.destroy', $student) }}" method="post"--}}
{{--                          class="float-left d-inline-block" title="Удалить">--}}
{{--                        @csrf--}}
{{--                        @method('DELETE')--}}
{{--                        <button type="submit" class="btn btn-danger btn-sm"--}}
{{--                                onclick="return confirm('Подтвердите удаление')">--}}
{{--                            <i class="fa fa-trash" aria-hidden="true"></i>--}}
{{--                        </button>--}}
{{--                    </form>--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--        @empty--}}
{{--            <td>No students</td>--}}
{{--        @endforelse--}}

{{--        </tbody>--}}
{{--    </table>--}}
@endsection
