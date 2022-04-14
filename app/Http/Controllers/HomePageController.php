<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view("homepage", compact("students"));
    }
}
