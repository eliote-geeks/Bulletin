<?php

namespace App\Http\Controllers;

use App\Models\Ue;
use App\Models\Note;
use App\Models\Student;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function register()
    {
        $students = Student::where('user_id',auth()->user()->id)->get();
        $ues = Ue::where('user_id',auth()->user()->id)->get();
        return view('note.register-note',compact('students','ues'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cc' => 'required',
            'sn' => 'required',
            'student_id' => 'required',
            'ue_id' => 'required',
        ]);

        
        $note = New Note;
        $note->cc = $request->cc;
        $note->sn = $request->sn;
        $note->semestriel = 0;
        $note->student_id = $request->student_id;
        $note->ue_id = $request->ue_id;
        $note->user_id = auth()->user()->id;
        $note->save();
        return redirect()->back()->with('message','New Note Added  SuccessFully!!');
    }

    public function edit(Note $note)
    {
        $students = Student::where('user_id',auth()->user()->id)->get();
        $ues = Ue::where('user_id',auth()->user()->id)->get();
        return view('note.update-note',compact('note','students','ues'));
    }

    public function update(Request $request,Note $note)
    {        
        $request->validate([
            'cc' => 'required ',
            'sn' => 'required',
            'student_id' => 'required ',
            'ue_id' => 'required '
        ]);
        $note->cc = $request->cc;
        $note->sn = $request->sn;
        $note->semestriel = 0;
        $note->student_id = $request->student_id;
        $note->ue_id = $request->ue_id;
        $note->user_id = auth()->user()->id;
        $note->save();
        return redirect()->back()->with('message','Note successfully Updated');            
    }

    public function delete(Note $note)
    {
        $note->delete();
        return redirect()->back()->with('message','Note Successfully Deleted');
    }

    public function view()
    {
        $notes = Note::where('user_id',auth()->user()->id)->get();
        return view('note.view-note',compact('notes'));
    }
}
