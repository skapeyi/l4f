<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmsController extends Controller
{

    public function index(){
      return view('sms.index');
    }
    public function ait_sms_callback(Request $request){

    }

    public function send_sms(Reqeust $request){

    }

    public function show($id){

    }
}
