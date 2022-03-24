<?php

namespace App\Http\Controllers;

use App\Models\Ue;
use App\Models\Note;
use App\Models\Student;
use App\Models\Semestry;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function register()
    {
        return view('user.create-user');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | max:30|min:4',
            'level' => 'required',
            'specialty' => 'required'
        ]);
        $student = new Student;
        $student->name = $request->name;
        $student->level = $request->level;
        $student->user_id = auth()->user()->id;
        $student->specialty = $request->specialty;
        $student->save();
        return redirect()->back()->with('message','Student successfully add');

    }

    public function edit(Student $student)
    {
        return view('user.update-student',compact('student'));
    }

    public function update(Request $request,Student $student)
    {        
        $request->validate([
            'name' => 'required ',
            'level' => 'required',
            'specialty' => 'required'
        ]);
        $student->name = $request->name;
        $student->level = $request->level;
        $student->specialty = $request->specialty;
        $student->user_id = auth()->user()->id;
        $student->save();
        return redirect()->back()->with('message','Student successfully Updated');            
    }

    public function delete(Student $student)
    {
        $student->delete();
        return redirect()->back()->with('message','Student Successfully Deleted');
    }

    public function detail(Student $student)
    {
        $somme = 0;
        $credit = 0;
        $moyenne = 0;
        $semestries = Semestry::where('user_id',auth()->user()->id)->get();
        $notes = Note::where('student_id',$student->id)->get();
        
        if( $notes->count() > 0)
        {
            foreach($semestries as $semestry)
            { 
                $ues = Ue::where('semestry_id',$semestry->id)->get();
                
                foreach($ues as $ue)
                {
                    foreach($notes as $note)
                    {
                        $note->semestriel = $ue->coef * ((($note->cc*30)/100) + (($note->sn*70)/100));                
                        $note->save();
                        $somme += $note->semestriel;
                        $credit += $ue->coef;
                    }
                }
                
                $moyenne = $somme / $credit;
                
            }
            return view('user.student-user',compact('student','semestries','ues','notes','moyenne'));
        }
        else
        {
            return view('index');
        }
    }


    public function view()
    {
        $students = Student::where('user_id',auth()->user()->id)->get();
        return view('user.view-student',compact('students'));
    }
}
