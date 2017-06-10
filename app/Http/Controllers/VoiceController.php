<?php

namespace App\Http\Controllers;
use App\Voice;
use Log;
use Illuminate\Http\Request;
use Datatables;

use Illuminate\Support\Facades\Auth;

class VoiceController extends Controller
{
    public function index(){
      return view('voice.index');
    }

    public function voices(){
      //return Datatables::of(Voice)
      return Datatables::of(Voice::query())->orderBy('id','desc')->make(true);
    }

    public function store(Request $request){
      $voice = new Voice();
      $voice->name = $request->name;
      $voice->phone = $request->phone;
      $voice->subject = $request->subject;
      $voice->gender = $request->gender;
      $voice->age_bracket = $request->age_bracket;
      $voice->reason = $request->reason;
      $voice->response = $request->response;
      $voice->status = $request->status;
      $voice->created_by = Auth::user()->id;

      if($voice->save()){
        flash("Record saved","success");
        return redirect('/call-logs');
      }
      else{
        flash("Record not saved","error");
        return redirect('/call-logs');
      }

    }
}
