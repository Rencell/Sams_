<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class navigationController extends Controller
{
    public function Dashboard(){
        $user = Auth::user()->name;
        return view('Teacher.Dashboard.index', compact('user'));
    }
}
