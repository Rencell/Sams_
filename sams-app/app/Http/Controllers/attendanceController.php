<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Student;
use App\Models\Attendance;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class attendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $teacherId = Auth::user()->id;
        
        $attendances =  Attendance::with('subject')->whereHas('subject', function($query) use ($teacherId){
            $query->where('teacher_id', $teacherId);
        })->get();

        return view('Teacher.Attendance.index', compact('attendances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function manageSubject($attendanceId){

        // 1. Present students
        $studentViews = Attendance::find($attendanceId)->student;
        // 2. Id of present students
        $student_presents = $studentViews->pluck('id');
        // 3. Fetch all student's id
        $fetch_student = Student::all()->pluck('id');
        // 4. Subtract the id of present to all student
        $filter_students = $fetch_student->diff($student_presents);
        // 5. Fetch absent students
        $student_absents = Student::whereIn('id', $filter_students)->get();


        return view('Teacher.Attendance.ManageAttendance.index' , compact('studentViews', 'student_absents'));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        
        $AttendanceId = $request->attendanceId;
        $studentId = $request->scan_text;


        $attend = Attendance::find($AttendanceId);
        if($attend->student()->where('student_id', $studentId)->exists()) {
            if($attend->date_attendance == now()->toDateString()){
                return response()->json(['warning' => 'The student has already attendance']);
            }
            
        }

        $attendance = Attendance::with('subject')->find($AttendanceId);
        $subjectId = $attendance->subject->id;
        
        
        
        $StudentExists = Student::where('id', $studentId)
            ->whereHas('subject', function($query) use ($subjectId){
                $query->where('id',$subjectId);
        })->first();

        if(!$StudentExists){
            return response()->json(['danger' => 'The student is not belong from the subject']);
        }
        $attendance->student()->attach($studentId, [
            'subject_id' => $subjectId,
            'status'     => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $First_name = Student::find($studentId)->Fname;
        $Last_name = Student::find($studentId)->Lname;

        return response()->json(['success' => 'Attendance Complete',
                                 'Fname'   => $First_name,
                                 'Lname'   => $Last_name]);
        

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
