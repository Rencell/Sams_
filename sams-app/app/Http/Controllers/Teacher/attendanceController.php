<?php

namespace App\Http\Controllers\Teacher;

use Carbon\Carbon;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Database\Factories\StudentFactory;

class attendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $teacherId = Auth::user()->id;
        
        $attendanceQuery =  Attendance::with('subject')->whereHas('subject', function($query) use ($teacherId){
            $query->where('teacher_id', $teacherId);
        });
        $attendances = $attendanceQuery->get();
        $archivedAttendances = $attendanceQuery->onlyTrashed()->get();
        return view('Teacher.Attendance.index', compact('attendances', 'archivedAttendances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function manageSubject($attendanceId){

        $isAttendanceExists = Attendance::find($attendanceId)   ;
        if(!$isAttendanceExists)
            abort(404); 
        // 1. Present students
        $studentViews = Attendance::find($attendanceId)->student;
        // 2. Id of present students
        $student_presents = $studentViews->pluck('id');
        // 3. Id of subject
        $subjectId = Attendance::find($attendanceId)->pluck('subject_id')->first();
        // 4. Fetch all subject's students id
        $fetch_student = Subject::with('student')->find($subjectId)->student->pluck('id');
        // 5. Subtract the id of present to all student
        $filter_students = $fetch_student->diff($student_presents);
        // 6. Fetch absent students
        $student_absents = Student::whereIn('id', $filter_students)->get();


        return view('Teacher.Attendance.ManageAttendance.index' , compact('studentViews', 'student_absents', 'attendanceId'));
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
        $studentId = $request->input('scan_text');

        return $this->storingAttendance($request, $AttendanceId, $studentId);
    }

    public function storingAttendance(Request $request, $AttendanceId, $studentId ){
        $AttendanceId = $request->attendanceId;
        $studentId = $request->input('scan_text');

        Log::info($studentId);
        $studentId = ltrim($studentId, '0');


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

    public function restoreAbsent(Request $request, string $attendanceId, string $student_id){
        $this->storingAttendance($request, $attendanceId, $student_id);
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
    public function destroyAttendance(string $attendance_id){
        $attendance = Attendance::find($attendance_id);
        $attendance->delete();

        return redirect()->back();
    }
    // Soft deletes recovery
    public function archive(Request $request){
        $selectedAttendanceIds = $request->input('selected_attendances', []);

        if (is_array($selectedAttendanceIds))
            if(!empty($selectedAttendanceIds))
                Attendance::withTrashed()->whereIn('id', $selectedAttendanceIds)->restore();
            
        return redirect()->back();
    }


    public function destroy(string $subj_id, string $stud_id)
    {
        $id = DB::table('attendance_subject')
                ->where('attendance_id', $subj_id)
                ->where('student_id', $stud_id)
                ->value('id');
        if ($id) {
            DB::table('attendance_subject')->where('id', $id)->delete();
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
