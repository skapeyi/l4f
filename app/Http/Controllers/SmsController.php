<?php

namespace App\Http\Controllers;
use Datatables;
use App\Sms;
use App\Http\Controllers\AfricasTalkingGateway;
use Illuminate\Http\Request;
use Log;

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

    public function send_sms(Request $request){
      $username   = env('AIT_USERNAME');
      $apikey     = env('AIT_KEY');

      $recipients = $request->telephone;
      $message = $request->message;

      $gateway    = new AfricasTalkingGateway($username, $apikey);
      $results = $gateway->sendMessage($recipients, $message);

      foreach($results as $result) {
        $sms = Sms::create([
          'from' => 'l4f',
          'to' => $result->number,
          'text' => $request->message,
          'type' => 'outgoing',
          'status' => $result->status,
          'message_id' => $result->messageId,
          'cost' => $result->cost
        ]);
      }



      return redirect('/sms-ougoing');
    }

    public function show($id){

    }
}
