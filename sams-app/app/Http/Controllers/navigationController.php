<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class navigationController extends Controller
{
    public function Dashboard(){
        return view('Teacher.Dashboard.index');
    }
    public function Student(){
        return view('Teacher.Student.student');
    }
    public function Subject(){
        return view('Teacher.Subject.index');
    }
    public function RFID(){
       
    }
    public function Setting(){
        return view('setting');
    }
    public function Attendance(){
        return view('Attendance');
    }
}
