<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
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
            'First_name'          => 'required|max:255',
            'Last_name'          => 'required|max:255',
            'birth_date'          => 'required|date',
            'email'   => 'required|max:255|email', Rule::unique('users', 'email')->ignore($user->id)
        ]);

        $user->fname = $request->First_name;
        $user->lname = $request->Last_name;
        $user->email = $request->email;
        $user->birth = $request->birth_date;
        $user->gender = $request->gender;
        $user->update();

        return redirect()->back();
    }

    public function updatePass(Request $request){

        if(!Hash::check($request->old_password, Auth::user()->password)){
            return back()->withErrors(['old_password' => 'The current password is incorrect.']);
        }

        $request->validate([
            'old_password' => ['required', 'max:255'],
            'new_password' => [
                'required',
                'min:8', 
                'max:255', 
            ],
            'confirm_password' => 'required|same:new_password',
        ]);
        
        

        $user = Auth::user();
        $user->password = Hash::make($request->confirm_password);
        $user->update();

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
