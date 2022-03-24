<?php

namespace App\Http\Controllers;

use App\Models\Semestry;
use Illuminate\Http\Request;

class SemestryController extends Controller
{
    public function register()
    {
        return view('semestry.register-semestry');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20|min:5',
        ]);

        $semestry = New Semestry;
        $semestry->user_id = auth()->user()->id;
        $semestry->name = $request->name;
        $semestry->save();
        return redirect()->back()->with('message','New Semestry Added  SuccessFully!!');
    }

    public function edit(Semestry $semestry)
    {
        return view('semestry.update-semestry',compact('semestry'));
    }

    public function update(Request $request,Semestry $semestry)
    {        
        $request->validate([
            'name' => 'required '
        ]);
        $semestry->name = $request->name;
        $semestry->save();
        return redirect(view('semestry.view-semestry'))->with('message','Semestry successfully Updated');            
    }

    public function delete(Semestry $semestry)
    {
        $semestry->delete();
        return redirect()->back()->with('message','Semestry Successfully Deleted');
    }

    public function view()
    {
        $semestries = Semestry::where('user_id',auth()->user()->id)->get();
        return view('semestry.view-semestry',compact('semestries'));
    }

}
