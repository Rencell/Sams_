<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class navigationController extends Controller
{
    public function Dashboard(){
        return view('dashboard');
    }
    public function Student(){
        return view('Teacher.Student.student');
    }
    public function Subject(){
        return view('Teacher.Subject.index');
    }
    public function RFID(){
        return view('RFIDattendance');
    }
    public function Setting(){
        return view('setting');
    }
    public function Attendance(){
        return view('Attendance');
    }
}
