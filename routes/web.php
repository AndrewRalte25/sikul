<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\TeacherController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard',[HomeController::class,"index"]);
Route::get('/redirects',[HomeController::class,"index"]);



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
});

Route::get('/adminusers',[AdminController::class,"index"]);

Route::get('/adminclass',[ClassController::class,"getclass"]);
Route::get('/adminaddclass',[ClassController::class,"index"]);
Route::post('/adminaddclass',[ClassController::class,"storeclass"]);
Route::get('/adminclass/{id}/view',[ClassController::class, 'view']);

Route::get('/adminsubject/{id}/add',[ClassController::class, 'indexsbj']);  
Route::post('/adminsubject/{id}/add',[ClassController::class, 'addsbj']);

Route::get('/adminteacher',[AdminController::class,"teacher"]);
Route::get('/addteacher',[AdminController::class,"teacherget"]);
Route::post('/addteacher',[AdminController::class,"teacheradd"]);
Route::post('/assign/{id}/teacher',[AdminController::class,"teacherassign"]);

Route::get('/adminstudent',[AdminController::class,"student"]);

Route::get('/adminadmission',[AdminController::class,"adminadmission"]);
Route::put('/admin/{id}/approve',[AdminController::class,"approve"]);







Route::get('/guardianstudent',[GuardianController::class,"guardianstudent"]);
Route::get('/guardianadmit',[GuardianController::class,"admit"]);
Route::post('/submitadmission',[GuardianController::class,"submitform"]);
Route::get('/guardian/{id}/remarks',[GuardianController::class,"remark"]);




Route::get('/teacher/{id}/class',[TeacherController::class,"class"]);
Route::get('/teacher/{id}/attendance',[TeacherController::class,"attendance"]);
Route::post('/teacher/attendance',[TeacherController::class,"storeattendance"]);
Route::get('/teacher/{id}/remarks',[TeacherController::class,"remark"]);
Route::post('/teacher/remarks',[TeacherController::class,"storeremark"]);
Route::get('/teacher/{id}/assignment',[TeacherController::class,"assignment"]);
Route::post('/assignment/store',[TeacherController::class,"storeassignment"]);
Route::delete('/delete-assignment/{assignment}', [TeacherController::class, 'destroy'])->name('assignments.destroy');


Route::get('/student/{id}/assignment',[StudentController::class,"assignment"]);
