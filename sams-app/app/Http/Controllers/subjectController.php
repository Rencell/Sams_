<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class subjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Subjects = Subject::all();
        return view('Teacher.Subject.index', compact('Subjects'));
    }

    public function manageStudent($id)
    {  
        $subject = Subject::find($id);
        $subject_students = $subject->student()->get();
        $students = Student::all();
        return view('Teacher.Subject.ManageStudent.index', [
            'subject_students'  => $subject_students,
            'students'          => $students,
            'id'                => $id
        ]);
    }

    public function storeStudent(Request $request, $id){
        $selectedPeopleIds = $request->selected_people;
        $subject = Subject::find($id);

        $subject->student()->syncWithoutDetaching($selectedPeopleIds);

        return redirect()->back()->with('success', 'Students updated successfully!');;
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
        $validation = $request->validate([
            'subject_name'  => 'required',
            'description'   => 'required',
        ]);

        Subject::create([
            'name'          => $request->subject_name,
            'teacher_id'    => Auth::user()->id,
            'description'   => $request->description,
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
