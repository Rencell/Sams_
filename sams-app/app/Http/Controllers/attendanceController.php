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
        
        $attendances =  Attendance::whereHas('subject', function($query) use ($teacherId){
            $query->where('teacher_id', $teacherId);
        })->get();

        return view('Teacher.Attendance.index', compact('attendances'));
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

        
        $AttendanceId = $request->subj_id;
        $studentId = $request->scan_text;


        $attend = Attendance::find($AttendanceId);
        if($attend->student()->where('student_id', $studentId)->exists()) {
            if($attend->date_attendance == now()->toDateString()){
                Log::info("Fuck you");
            }
            
            
        }

        $attendance = Attendance::with('subject')->find($AttendanceId);
        $subjectId = $attendance->subject->id;

        $StudentExists = Student::where('id', $studentId)
            ->whereHas('subject', function($query) use ($subjectId){
                $query->where('id',$subjectId);
        })->first();

        if(!$StudentExists){
            abort(404);
        }
        $attendance->student()->attach($studentId, [
            'subject_id' => $subjectId,
            'status'     => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        
        
        

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
