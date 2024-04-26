<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;

        if ($role == '0') {
            return view('admin.dash');
        } elseif ($role == '1') {
            // For teachers, get all assignments
            $assignments = Assignment::all();
            return view('teacher.dash', compact('assignments'));
        } elseif ($role == '2') {
            // For guardians, get assignments for their students
            $guardianId = Auth::id();
            $assignments = Assignment::whereIn('subject_id', function ($query) use ($guardianId) {
                $query->select('subjects.id')
                      ->from('subjects')
                      ->join('classses', 'subjects.class_id', '=', 'classses.id')
                      ->join('students', 'classses.id', '=', 'students.class_id')
                      ->where('students.guardian_id', $guardianId);
            })->get();
            return view('guardian.dash', compact('assignments'));

        } elseif ($role == '3') {
            $userId = auth()->id();
        
            // Retrieve the student record using the user ID
            $student = Student::where('user_id', $userId)->first();
            
            if ($student) {
                // Load assignments for all subjects related to the student
                $assignments = Assignment::whereIn('subject_id', function($query) use ($student) {
                    $query->select('id')->from('subjects')->where('class_id', $student->class_id);
                })->get();
    
                return view('student.dash', compact('assignments'));
            } else {
               
                abort(403, 'Unauthorized');
            }
        } 
    }


}
