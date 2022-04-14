<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AjaxStudentController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('ajaxStudents.index');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchstudent()
    {
        $students = Student::all();
        return response()->json([
            'students'=>$students,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullName' => 'required|min:3|max:120',
            'course' => 'required|min:3|max:120',
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
            $student->fill($validator->validated());
            $student->save();
            return response()->json([
                'status'=>200,
                'message'=>'Student Added Successfully.'
            ]);
        }

    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
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

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'fullName' => 'required|min:3|max:120',
            'course' => 'required|min:3|max:120',
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
                $student->update($validator->validated());
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

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
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
