<?php

namespace App\Http\Controllers;
use App\Models\Classs;
use App\Models\Subject;
use App\Models\Teacher;

use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        return view('admin.addclass',);
    }


    public function indexsbj($id)
    {   
        $class = classs::find($id);
        $sbj = Subject::where('class_id', $id)->get();
        return view('admin.addsbj',compact('class', 'sbj',));
    }

    public function view($id)
    {    
    $teachers = teacher::get();
    $class = classs::find($id);
    $sbj = Subject::where('class_id', $id)->get();
    return view('admin.viewclass', compact('class', 'sbj','teachers'));
    }


    public function getclass()
    {   
        $class = classs::get();
        return view('admin.class',compact('class'));
    }

    public function storeclass(Request $request)
    {
       
        $data = new classs();
        $data->class_name = $request->name;

        $data->save();
        
        return redirect('/adminclass')->with('success', 'Added Successfully');
    }

    public function addsbj(Request $request)
    {
       
        $data = new subject();
        $data->subject_name = $request->name;
        $data->class_id = $request->class_id;
        $data->save();
        
        return redirect('/adminclass')->with('success', 'Added Successfully');
    }
}
