@extends('layouts.app')

@section('content')

    {{-- Add Modal --}}
    <div class="modal fade" id="AddStudentModal" tabindex="-1" aria-labelledby="AddStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AddStudentModalLabel">Add Student Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <ul id="save_msgList"></ul>

                    <div class="form-group mb-3">
                        <label for="">Full Name</label>
                        <input type="text" required class="fullName form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Course</label>
                        <input type="text" required class="course form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary add_student">Save</button>
                </div>

            </div>
        </div>
    </div>


    {{-- Edit Modal --}}
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit & Update Student Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <ul id="update_msgList"></ul>

                    <input type="hidden" id="stud_id" />

                    <div class="form-group mb-3">
                        <label for="">Full Name</label>
                        <input type="text" id="fullName" required class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Course</label>
                        <input type="text" id="course" required class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary update_student">Update</button>
                </div>

            </div>
        </div>
    </div>
    {{-- Edn- Edit Modal --}}


    {{-- Delete Modal --}}
    <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Student Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>Confirm to Delete Data ?</h4>
                    <input type="hidden" id="deleteing_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary delete_student">Yes Delete</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End - Delete Modal --}}


                <h1>Ajax students index Page</h1>
                <div id="success_message"></div>
                <button type="button" class="btn btn-primary mt-5 mb-5" data-toggle="modal"
                    data-target="#AddStudentModal">Add Student</button>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>№</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Course</th>
                                <th>Data</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>

@endsection

@section('scripts')

    <script>
        $(document).ready(function () {

            fetchstudent();

            function getCorrectData(str)
            {
                let arr = str.split("T");
                arr[1] = arr[1].substring(0, 8);
                return arr.join(' ');
            }

            function fetchstudent() {
                $.ajax({
                    type: "GET",
                    url: "/ajax-fetch-students",
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        $('tbody').html("");
                        $.each(response.students, function (key, item) {
                            $('tbody').append('<tr>\
                            <td>' + (key + 1) + '</td>\
                            <td>' + item.id + '</td>\
                            <td>' + item.fullName + '</td>\
                            <td>' + item.course + '</td>\
                            <td style="min-width: 180px">' + getCorrectData(item.updated_at) + '</td>\
                            <td><button type="button" value="' + item.id + '" class="btn btn-primary editbtn btn-sm">Edit</button></td>\
                            <td><button type="button" value="' + item.id + '" class="btn btn-danger deletebtn btn-sm">Delete</button></td>\
                        \</tr>');
                        });
                    }
                });
            }

            $(document).on('click', '.add_student', function (e) {
                e.preventDefault();

                $(this).text('Sending..');

                var data = {
                    'fullName': $('.fullName').val(),
                    'course': $('.course').val(),
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/ajax-students",
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        if (response.status == 400) {
                            $('#save_msgList').html("");
                            $('#save_msgList').addClass('alert alert-danger');
                            $.each(response.errors, function (key, err_value) {
                                $('#save_msgList').append('<li>' + err_value + '</li>');
                            });
                            $('.add_student').text('Save');
                        } else {
                            $('#save_msgList').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#AddStudentModal').find('input').val('');
                            $('.add_student').text('Save');
                            $('#AddStudentModal').modal('hide');
                            fetchstudent();
                            fadeOutMsg();
                        }
                    }
                });

            });

            $(document).on('click', '.editbtn', function (e) {
                e.preventDefault();
                var stud_id = $(this).val();
                // alert(stud_id);
                $('#editModal').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/ajax-edit-student/" + stud_id,
                    success: function (response) {
                        if (response.status == 404) {
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#editModal').modal('hide');
                        } else {
                            // console.log(response.student.fullName);
                            $('#fullName').val(response.student.fullName);
                            $('#course').val(response.student.course);
                            $('#stud_id').val(stud_id);
                        }
                    }
                });
                $('.btn-close').find('input').val('');

            });

            $(document).on('click', '.update_student', function (e) {
                e.preventDefault();

                $(this).text('Updating..');
                var id = $('#stud_id').val();
                // alert(id);

                var data = {
                    'fullName': $('#fullName').val(),
                    'course': $('#course').val(),
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "PUT",
                    url: "/ajax-update-student/" + id,
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        if (response.status == 400) {
                            $('#update_msgList').html("");
                            $('#update_msgList').addClass('alert alert-danger');
                            $.each(response.errors, function (key, err_value) {
                                $('#update_msgList').append('<li>' + err_value +
                                    '</li>');
                            });
                            $('.update_student').text('Update');
                        } else {
                            $('#update_msgList').html("");

                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#editModal').find('input').val('');
                            $('.update_student').text('Update');
                            $('#editModal').modal('hide');
                            fetchstudent();
                            fadeOutMsg();
                        }
                    }
                });

            });

            $(document).on('click', '.deletebtn', function () {
                var stud_id = $(this).val();
                $('#DeleteModal').modal('show');
                $('#deleteing_id').val(stud_id);
            });

            $(document).on('click', '.delete_student', function (e) {
                e.preventDefault();

                $(this).text('Deleting..');
                var id = $('#deleteing_id').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "DELETE",
                    url: "/ajax-delete-student/" + id,
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        if (response.status == 404) {
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('.delete_student').text('Yes Delete');
                        } else {
                            $('#success_message').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('.delete_student').text('Yes Delete');
                            $('#DeleteModal').modal('hide');
                            fetchstudent();
                            fadeOutMsg();
                        }
                    }
                });
            });

            $(document).on('click', '.close-btn', function () {
                $('#save_msgList').html("");
                $('#save_msgList').removeClass('alert alert-danger');
                $('#update_msgList').html("");
                $('#update_msgList').removeClass('alert alert-danger');
            })

            function fadeOutMsg()
            {
                $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
            }

        });

    </script>

@endsection
