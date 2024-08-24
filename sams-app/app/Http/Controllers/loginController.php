<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = ([
            
            'email' => 'required|email|max:255',
            'password' => 'required|string',

        ]);

        $attribute = $request->validate($validation);
        if(!Auth::attempt($attribute)){
             throw ValidationException::withMessages([
                'email' => 'Account does not match or exist',       
                'password' => 'Account does not match or exist'
             ]);
             
        }

        $request->session()->regenerate();
        if(Auth::user()->isAdmin == '0')
            return redirect('/dashboard');
        else
            return redirect('/admin/student');
    }

    /**
     * Display the specified resource.
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, user $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
