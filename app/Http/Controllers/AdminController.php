<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Guardian;
use App\Models\Subject;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Jetstream;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $user = User::get();
        return view('admin.user', compact('user'));
    }

    public function class()
    {
        // Your logic for managing classes
    }

    public function teacher()
    {
        $user = User::where('role', '1')->get();
        return view('admin.teacher', compact('user'));
    }

    public function teacherget()
    {
        return view('admin.addteacher');
    }

    public function teacheradd(Request $request)
    {
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', 'string', 'min:8'], // Manually define password rules
            'role' => ['required', 'string'],
        ])->validate();
    
        // Create a new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
    
        // Check the role and create the corresponding record
        if ($request->role == '1') {

          // dd("$user");
            Teacher::create([
                'user_id' => $user->id, 
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role,
              
            ]);
        } elseif ($request->role == '2') {
            Guardian::create([
                // Add guardian specific fields
            ]);
        } elseif ($request->role == '3') {
            Student::create([
                // Add student specific fields
            ]);
        }
    
        return redirect('/adminteacher')->with('success', 'Added Successfully');
    }
    public function teacherassign(Request $request, $id)
{   
    $subject = Subject::findOrFail($id);

    $request->validate([
        'teacher_id' => 'required|exists:users,id',
    ]);

    $subject->teacher_id = $request->input('teacher_id');
    $subject->save();

    return redirect()->back();
}

}
