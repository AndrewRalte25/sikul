<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Student; // Assuming you have a Student model
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function getAttendance(Request $request)
    {
        $studentId = $request->input('student_id');

        // Filter attendance based on the selected student if student_id is provided
        $attendances = $studentId ? Attendance::where('student_id', $studentId)->get() : Attendance::all();

        $events = $attendances->map(function ($attendance) {
            return [
                'id' => $attendance->id,
                'title' => $attendance->status,
                'start' => $attendance->date,
                'className' => $this->getClassName($attendance->status),
            ];
        });

        return response()->json($events);
    }

    private function getClassName($status)
    {
        switch ($status) {
            case 'present':
                return 'present-event';
            case 'absent':
                return 'absent-event';
            default:
                return 'no-attendance-event';
        }
    }

    public function showCalendar()
    {
        // Fetch all students for the dropdown menu
        $students = Student::all();

        return view('attendance', compact('students'));
    }
}
