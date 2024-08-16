<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $Student = Student::get();

       return view('Teacher.Student.index', compact('Student'));
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
            'stud_id'   => 'required|unique:students,id',
            'rfid'      => 'required|unique:students,rfid', 
            'fname'     => 'required|max:255',
            'lname'     => 'required|max:255',
            'gender'    => 'required|max:10',
            's_email'   => 'required|email|max:255|unique:students,email',
            'birth'     => 'required|date',
        ]);


        Student::create([
            'id'            =>  $request->stud_id,
            'rfid'          =>  $request->rfid,
            'fname'         =>  $request->fname,
            'lname'         =>  $request->lname,
            'gender'        =>  $request->gender,
            'email'         =>  $request->s_email,
            'birth_date'    =>  $request->birth,
        ]);

        return redirect()->back();
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
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id' => 'required', Rule::unique('students', 'id')->ignore($id),
            'rfid' => 'required', Rule::unique('students', 'rfid')->ignore($id),
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'gender' => 'required|max:10',
            'email' => 'required', Rule::unique('students', 'email')->ignore($id),
            'birth_date' => 'required|date',
        ]);

        $student = Student::findOrFail($id);

        $data = $request->except(['_token', '_method', 'id']);
        $student->update($data);

        return response()->json(['success' => true, 'message' => 'Student updated successfully.']);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       
        Student::find($id)->delete();

        return redirect()->back();
    }
}
