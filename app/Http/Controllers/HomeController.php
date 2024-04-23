<?php

namespace App\Http\Controllers;

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
            return view('teacher.dash');
        } elseif ($role == '2') {
            return view('guardian.dash');
        } elseif ($role == '3') {
            return view('student.dash');
        } 
    }
}