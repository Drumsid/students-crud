<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $students = Student::all();
        return view("students.index", compact("students"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view("students.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StudentRequest  $request
//     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StudentRequest $request)
    {
        $data = $request->validated();
        $student = new Student();
        $student->fill($data);
        $student->save();
        return response()->json(['success'=>'Laravel ajax example is being processed.']);
//        return redirect()
//            ->route('homepage')->with('success', 'Student added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student $student
     * @return \Illuminate\View\View
     */
    public function show(Student $student)
    {
        return view("students.show", compact("student"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student $student
     * @return \Illuminate\View\View
     */
    public function edit(Student $student)
    {
        return view("students.edit", compact("student"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StudentRequest  $request
     * @param  \App\Models\Student $student
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StudentRequest $request, Student $student)
    {
        $data = $request->validated();
        $student->fill($data);
        $student->save();
        return redirect()
            ->route('homepage')->with('success', 'Student update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student $student
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()
            ->route('homepage')->with('success', 'Student deleted successfully!');
    }
}
