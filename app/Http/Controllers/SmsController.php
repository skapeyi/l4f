<?php

namespace App\Http\Controllers;
use Datatables;
use App\Sms;

use Illuminate\Http\Request;

class SmsController extends Controller
{

    public function incoming(){
      return view('sms.incoming');
    }

    public function incoming_messages(){
      return Datatables::of(Sms::where(['type' => 'incoming']))->make(true);
    }

    public function outgoing(){
      return view('sms.outgoing');
    }

    public function outgoing_messages(){
      return Datatables::of(Sms::where(['type' => 'outgoing']))->make(true);
    }

    public function ait_sms_callback(Request $request){
      $sms = Sms::create([
        'from' => $request->from,
        'to' => $request->to,
        'text' => $request->text,
        'date' => $request->date,
        'aft_id' => $request->id,
        'link_id' => $request->link_id,
        'type' => 'incoming'
      ]);
    }

    public function send_sms(Reqeust $request){

    }

    public function show($id){

    }
}
