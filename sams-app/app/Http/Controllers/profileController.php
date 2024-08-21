<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class profileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = Auth::user();
        return view('Teacher.Profile.index' , compact('profile'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
   
    public function update(Request $request)
    {
        
        $user = Auth::user();
        $request->validate([
            'name'          => 'required|max:255',
            'email'   => 'required|max:255|email', Rule::unique('students', 'email')->ignore($user->id)
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->update();

        return redirect()->back();
    }

    public function updatePass(Request $request){
        $request->validate([
            'old_password' => ['required', 'max:255'],
            'new_password' => [
                'required',
                'min:8', 
                'max:255', 
            ],
            'confirm_password' => 'required|same:newpassword',
        ]);

        if(!Hash::check($request->oldpassword, Auth::user()->password)){
            return back()->withErrors(['oldpassword' => 'The current password is incorrect.']);
        }

        $user = Auth::user();
        $user->password = Hash::make($request->confirmpassword);
        $user->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
