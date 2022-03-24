<?php

namespace App\Http\Controllers;

use App\Models\Semestry;
use App\Models\Ue;
use Illuminate\Http\Request;

class UeController extends Controller
{
    public function register()
    {
        $semestries = Semestry::where('user_id',auth()->user()->id)->get();
        return view('ue.register-ue',compact('semestries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:30|min:5',
            'coef' => 'required',
            'semestry_id' => 'required',
        ]);

        $ue = New Ue;
        $ue->name = $request->name;
        $ue->semestry_id = $request->semestry_id;
        $ue->coef = $request->coef;
        $ue->user_id = auth()->user()->id;
        $ue->save();
        return redirect()->back()->with('message','New Ue Added  SuccessFully!!');
    }

    public function edit(Ue $ue)
    {
        $semestries = Semestry::where('user_id',auth()->user()->id)->get();
        return view('ue.update-ue',compact('ue','semestries'));
    }

    public function update(Request $request,Ue $ue)
    {        
        $request->validate([
            'name' => 'required ',
            'coef' => 'required',
            'semestry_id' => 'required'
        ]);
        $ue->name = $request->name;
        $ue->coef = $request->coef;
        $ue->semestry_id = $request->semestry_id;
        $ue->user_id = auth()->user()->id;
        $ue->save();
        return redirect()->back()->with('message','Ue successfully Updated');            
    }

    public function delete(Ue $ue)
    {
        $ue->delete();
        return redirect()->back()->with('message','Ue Successfully Deleted');
    }

    public function view()
    {
        $ues = Ue::where('user_id',auth()->user()->id)->get();
        return view('ue.view-ue',compact('ues'));
    }
}
