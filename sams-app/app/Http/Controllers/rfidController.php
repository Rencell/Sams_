<?php

namespace App\Http\Controllers;

use id;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class rfidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::where('teacher_id',Auth::id())->with('user')->get();
        return view('Teacher.RFID.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($subj_id)
    {
        $attendanceRowExists = Attendance::latest()->first();

        $attendanceId = $attendanceRowExists ? $attendanceRowExists->id : null;
        return view('Teacher.RFID.rfid-start', compact('subj_id', 'attendanceId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $subjectId = $request->input('subject_id');
        $mytime = Carbon::now();
        
        Attendance::create([
            'subject_id'        => $subjectId,
            'date_attendance'   => $mytime->toDateTimeString(),
        ]);
    
        return response()->json(['message' => 'Attendance recorded successfully!']);
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
