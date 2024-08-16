<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function student(){
        return view('Admin.students');
    }
    public function teacher(){
        return view('Admin.teachers');
    }
    public function admin(){
        return view('Admin.admins');
    }
}
