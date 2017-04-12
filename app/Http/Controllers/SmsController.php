<?php

namespace App\Http\Controllers;
use Log;
use Excel;
use App\Sms;
use Datatables;
use App\BulkLog;
use Illuminate\Http\Request;
use App\Http\Controllers\AfricasTalkingGateway;


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

    public function ait_delivery_callback(Request $request){
      Log::info($request);
      $message = Sms::where(['message_id' => $request['message_id']])->first();
      $message->status = $request['status'];
      $message->save();
    }

    public function send_sms(Request $request){
      $username   = env('AIT_USERNAME');
      $apikey     = env('AIT_KEY');

      $recipients = $request->telephone;
      $recipients = substr($recipients,1);
      $recipients = "+256".$recipients;
      Log::info($recipients);
      $message = $request->message;

      $log = new BulkLog();
      $log->message = $message;
      $log->recipients = $recipients;
      $log->save();

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

    public function send_bulk_sms(Request $request){
      $username   = env('AIT_USERNAME');
      $apikey     = env('AIT_KEY');
      $recipients = "";

      if ($request->hasFile('import_file')){
        $path = $request->file('import_file')->getRealPath();
			  $data = Excel::load($path, function($reader) {})->get();

			  if(!empty($data)){
          foreach ($data->toArray() as $key => $value) {
            if(!empty($value)){
              foreach ($value as $v) {
                $recipients = $recipients.',+256'.$v['phone'];
              }
            }
          }
        }
        $recipients = substr($recipients, 1);
        $message = $request->message;

        $log = new BulkLog();
        $log->message = $message;
        $log->recipients = $recipients;
        $log->save();

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
      else{
        flash("No file attached saved","success");
        return redirect('/sms-ougoing');
      }
    }

    public function show($id){

    }
}
