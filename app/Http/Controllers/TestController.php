<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;

class TestController extends Controller
{
    //
    function index(){
        $note = Test::all();
        return view("test",["notes"=>$note]);
    }
    function save(Request $request){
        $request->validate([
                "name"=>["required","string"],
                "email"=>["required"],
                "note"=>["required"]                ]
        );

        Test::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "note"=>$request->note
        ]);



            return redirect()->back()->with("success","the form is syccefull submited");




    }

    function delete($id){
        Test::find($id)->delete();
        return redirect()->back()->with("success","Deleted Succesfully");
    }

    function edit($id){
        $note = Test::where('id', $id)->first();
        $notes = Test::all();

        return view('test', compact('note','notes'));
    }

    function update(Request $request, $id){
        $data = Test::find($id);
        $data->name=$request->name;
        $data->note=$request->note;
        $data->email=$request->email;

        if($data->save()){
            return redirect()->route('test.home')->with('success','hahahahah');
        }else{
            return $id;
        }

    }

}
