<?php

use App\Http\Controllers\NoteController;
use App\Models\Student;
use App\Http\Controllers\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SemestryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Student

Route::middleware(['auth'])->group(function(){

    //register student
    Route::get('signup',[StudentController::class,'register'])->name('student.register');
    
    //Store student
    Route::post('signup-request',[StudentController::class,'store'])->name('student.store');
    
    //View student
    Route::get('student-view',[StudentController::class,'view'])->name('students.view');
    
    //Detail student
    Route::get('student-detail/{student}',[StudentController::class,'detail'])->name('students.detail');
    
    //edit student
    Route::get('student-edit/{student}',[StudentController::class,'edit'])->name('student.edit');
    
    //update student
    Route::post('student-update/{student}',[StudentController::class,'update'])->name('student.update');
    
    //Delete student
    Route::get('delete-student/{student}',[StudentController::class,'delete'])->name('student.delete');
    
    
    //Ue
    Route::get('ue-register',[UeController::class,'register'])->name('ue.register');
    
    //Store ue
    Route::post('register-ue',[UeController::class,'store'])->name('ue.store');
    
    //View Ue
    Route::get('ues-view',[ueController::class,'view'])->name('ues.view');
    
    //edit Ue
    Route::get('ue-edit/{ue}',[UeController::class,'edit'])->name('ue.edit');
    
    //update Ue
    Route::post('ue-update/{ue}',[UeController::class,'update'])->name('ue.update');
    
    //Delete Ue
    Route::get('delete-ue/{ue}',[UeController::class,'delete'])->name('ue.delete');
    
    
    
    //Note
    Route::get('note-register',[NoteController::class,'register'])->name('note.register');
    
    //Store note
    Route::post('register-note',[NoteController::class,'store'])->name('note.store');
    
    //View note
    Route::get('notes-view',[NoteController::class,'view'])->name('notes.view');
    
    //edit note
    Route::get('note-edit/{note}',[NoteController::class,'edit'])->name('note.edit');
    
    //update note
    Route::post('note-update/{note}',[NoteController::class,'update'])->name('note.update');
    
    //Delete note
    Route::get('delete-note/{note}',[NoteController::class,'delete'])->name('note.delete');
    
    
    //Semestry
    Route::get('semestry-register',[SemestryController::class,'register'])->name('semestry.register');
    
    //Store Semestry
    Route::post('create-semestry',[SemestryController::class,'store'])->name('semestry.store');
    
    //View Semestry
    Route::get('semestries-view',[SemestryController::class,'view'])->name('semestries.view');
    
    //edit Semestry
    Route::get('semestry-edit/{semestry}',[SemestryController::class,'edit'])->name('semestry.edit');
    
    //update Semestry
    Route::post('semestry-update/{semestry}',[SemestryController::class,'update'])->name('semestry.update');
    
    //Delete Semestry
    Route::get('delete-semestry/{semestry}',[SemestryController::class,'delete'])->name('semestry.delete');
});


//index
Route::get('/', function () {
    return view('index');  
})->middleware('auth');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
