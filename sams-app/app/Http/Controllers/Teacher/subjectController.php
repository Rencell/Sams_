<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class subjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjectQuery = Subject::where('teacher_id',Auth::id())->with('user');
        $Subjects = $subjectQuery->get();
        $ArchivedSubjects = $subjectQuery->onlyTrashed()->get();
        return view('Teacher.Subject.index', compact('Subjects', 'ArchivedSubjects'));
    }

  

    public function storeStudent(Request $request, $id){
        
        $selectedPeopleIds = $request->selected_people;
        $subject = Subject::find($id);

        $subject->student()->syncWithoutDetaching($selectedPeopleIds);

        return redirect()->back()->with('success', 'Students updated successfully!');;
    }

    public function deleteStudent($subj_id , $stud_id){
        DB::table('subject_student')
            ->where('subject_id', $subj_id)
            ->where('student_id', $stud_id)
            ->delete();

        return redirect()->back();
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
        $subject = Subject::find($id);


        if(!$subject)
            abort(404);

        $subject_students = $subject->student()->get();
        $students = Student::all();
        return view('Teacher.Subject.ManageStudent.index', [
            'subject_students'  => $subject_students,
            'students'          => $students,
            'id'                => $id
        ]);
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
            'name'  => 'required',
            'description'   => 'required',
        ]);
            
        
        $subject = Subject::findOrFail($id);

        $data = $request->except(['_token', '_method', 'id']);
        $subject->update($data);

        return response()->json(['success' => true, 'message' => 'Subject updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Subject::find($id)->delete();

        return redirect()->back();
    }

    public function archive(Request $request){
        $selectedSubjectIds = $request->input('selected_subjects', []);

        if (is_array($selectedSubjectIds))
            if(!empty($selectedSubjectIds)){
                Subject::withTrashed()->whereIn('id', $selectedSubjectIds)->restore();
            }
        

        return redirect()->back();
    }
}
