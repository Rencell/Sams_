<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class admin_adminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $admins = User::get()->whereIn('isAdmin', '1');
        $archivedAdmins = User::onlyTrashed()->get()->whereIn('isAdmin', '1');
       // $archivedStudents = User::onlyTrashed()->get();

        return view('Admin.Admin.index', compact('admins', 'archivedAdmins'));
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
        $request->validate([
            'fname'             => 'required|max:255',
            'lname'             => 'required|max:255',
            'gender'            => 'required|max:10',
            'email'             => 'required|email|max:255|unique:users,email',
            'birth'             => 'required|date',
            'password'          => 'required', 'max:255',
            'confirm_password'  => 'required|same:password',
        ]);


        User::create([
            'fname'             =>  $request->fname,
            'lname'             =>  $request->lname,
            'gender'            =>  $request->gender,
            'email'             =>  $request->s_email,
            'email_verified_at' =>  now(),
            'birth'             =>  $request->birth,
            'password'          =>  Hash::make($request->confirm_password),
            
        ]);

        return redirect()->back();
    }

    public function archive(Request $request)
    {
        $selectedAdminIds = $request->input('selected_admin', []);

        if (is_array($selectedAdminIds))
            if(!empty($selectedAdminIds)){
                User::withTrashed()->whereIn('id', $selectedAdminIds)->restore();
            }
        

        return redirect()->back();
    }

    public function update(Request $request, string $id)
    {
        $validation = $request->validate([
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'gender' => 'required|max:10',
            'email' => 'required', Rule::unique('users', 'email')->ignore($id),
            'birth' => 'required|date',
        ]);

        $user = User::findOrFail($id);
        $user->update($validation);

        return response()->json(['success' => true, 'message' => 'Admin updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();

        return redirect()->back();
    }
}
