<?php

namespace App\Http\Controllers;
use App\Models\Classs;
use App\Models\Remark;
use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Guardian;
use App\Models\Subject;
use App\Models\Attendance;
use App\Models\Assignment;
use Illuminate\Support\Facades\Auth;



use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Jetstream;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TeacherController extends Controller
{
    public function class($id)
{   
    $subject =Subject::where('teacher_id', $id)->get();
    $class =Classs::get();
    $user = Student::get();

    // dd($user);
    return view('teacher.student', compact('user','subject','class'));
}

public function attendance($id)
{   
    
    $class = Classs::find($id);
    $students = Student::where('class_id', $id)
                   ->where('status', 'yes')
                   ->get();


    // dd($user);
    return view('teacher.attendance', compact('students','class'));
}
public function storeattendance(Request $request)
    {
        $class_id = $request->class_id;
        $request->validate([
            'class_id' => 'required|exists:classses,id',
            'attendance' => 'required|array',
            'attendance.*' => 'required|in:present,absent',
        ]);

        $class_id = $request->class_id;
        foreach ($request->attendance as $student_id => $status) {
            Attendance::create([
                'class_id' => $class_id,
                'student_id' => $student_id,
                'status' => $status,
                'date' => now()->toDateString(), 
            ]);
        }

        return redirect('/dashboard')->with('success', 'Attendance recorded successfully.');
    }

    public function remark($id)
{   
    
    $class = Classs::find($id);
    $students = Student::where('class_id', $id)
    ->where('status', 'yes')
    ->get();


    // dd($user);
    return view('teacher.remark', compact('students','class'));
}
public function storeremark(Request $request)
    {   
        $remark = new Remark();
        $remark->class_id = $request->class_id;
        $remark->student_id = $request->student_id;
        $remark->remarks = $request->remarks;
        $remark->save();
        return redirect('/dashboard')->with('success', 'Remark recorded successfully.');
    }

    public function assignment($id)
{   
    
    $subjects=Subject::where('teacher_id',$id)->get();
  
    return view('teacher.assignment', compact('subjects'));
}
public function storeassignment(Request $request)
    {
       
        $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'assignment' => 'required|string',
            'due_date' => 'required|date',
        ]);

      
        $assignment = new Assignment();
        $assignment->subject_id = $request->subject_id;
        $assignment->assignment = $request->assignment;
        $assignment->due_date = $request->due_date;
        $assignment->teacher_id = Auth::id();
        $assignment->save();

       
        return redirect('/dashboard')->with('success', 'Assignment added successfully.');
    }
}
