<?php
namespace App\Http\Controllers;
use App\Models\Classs;
use App\Models\User;
use App\Models\Student;
use App\Models\Remark;
use App\Models\Guardian;
use App\Models\Subject;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class GuardianController extends Controller
{
    public function index()
    {    
         $user = user::get();
         return view('guardian.student', compact('user'));
    }  

    public function admit()
    {    
         $user = user::get();
         $classs = classs::get();
         return view('guardian.admit', compact('user','classs'));
    }  

    public function submitform(Request $request)
    {

       
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string|in:Male,Female,Other',
            'email' => 'required|email|unique:users|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'last_marksheet' => 'required|file|mimes:pdf,jpeg,png|max:10240', 
            'class' => 'required|exists:classses,id', 
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|string|same:password|min:8',
        ], [
            'email.unique' => 'The email has already been taken.',
        ]);
        

        $user = User::create([
            'name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => '3',
           
        ]);
        

        
        $file = $request->file('last_marksheet');
        Student::create([
            'user_id' => $user->id, 
            'name' => $user->name,
            'email' => $user->email,
            'dob' => $request->date_of_birth,
            'gender' => $request->gender,
            'marksheet' => $file->storeAs('/last_marksheets', $file->getClientOriginalName()),
            'address' => $request->address,
            'phone_number'=>$request->phone,
            'class_id'=>$request->class,
            'guardian_id'=>$request->guardian_id,
          
        ]);

       
        return redirect()->back()->with('success', 'Admission form submitted successfully!');
    }
    public function guardianstudent()
{
    $guardianId = auth()->user()->id;
    $students = Student::where('guardian_id', $guardianId)->get();
    $remarks = Remark::get();
    $class = Classs::get();
    
    
    return view('guardian.student', compact('students','remarks','class'));
}
public function remark($studentId)
{   
    $guardianId = Auth::user()->id;
        $students = Student::where('guardian_id', $guardianId)                           
                            ->get();
        
    $remarks = Remark::where('student_id', $studentId)->get();
    return view('guardian.remark', compact('remarks','students'));
}

public function fees()
{   
    $guardianId = Auth::user()->id;
    $students = Student::where('guardian_id', $guardianId)
                            ->where('status', 'yes')
                            ->where('admit', 'no')
                            ->get();
    
 
    $monthly = Student::where('guardian_id', $guardianId)
    ->where('status', 'yes')
    ->where('admit', 'yes')
    ->get();
        
        return view('guardian.fees', compact('students','monthly'));
}
    
    
}
