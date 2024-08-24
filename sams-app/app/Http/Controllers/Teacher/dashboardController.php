<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;

class dashboardController extends Controller
{
    public function index(){
        $user = Auth::user()->fname;

        $student_count = Student::all()->count();
        $subject_count = Subject::all()->whereIn('teacher_id', Auth::user()->id)->count();
        return view('Teacher.Dashboard.index', compact('user', 'student_count', 'subject_count'));
    }
}
