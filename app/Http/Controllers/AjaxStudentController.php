<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AjaxStudentController extends Controller
{
    public function index()
    {
        return view('ajaxStudents.index');
    }

    public function fetchstudent()
    {
        $students = Student::all();
        return response()->json([
            'students'=>$students,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullName'=> 'required|max:191',
            'course'=>'required|max:191',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $student = new Student;
            $student->fullName = $request->input('fullName');
            $student->course = $request->input('course');
            $student->save();
            return response()->json([
                'status'=>200,
                'message'=>'Student Added Successfully.'
            ]);
        }

    }

    public function edit($id)
    {
        $student = Student::find($id);
        if($student)
        {
            return response()->json([
                'status'=>200,
                'student'=> $student,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Student Found.'
            ]);
        }

    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'fullName'=> 'required|max:191',
            'course'=>'required|max:191',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $student = Student::find($id);
            if($student)
            {
                $student->fullName = $request->input('fullName');
                $student->course = $request->input('course');

                $student->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Student Updated Successfully.'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'No Student Found.'
                ]);
            }

        }
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        if($student)
        {
            $student->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Student Deleted Successfully.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Student Found.'
            ]);
        }
    }
}
