<?php

namespace App\Http\Controllers;
use App\Voice;
use Log;
use Illuminate\Http\Request;
use Datatables;

class VoiceController extends Controller
{
    public function index(){
      return view('voice.index');
    }

    public function voices(){
      //return Datatables::of(Voice)
      return Datatables::of(Voice::query())->make(true);
    }

    public function store(Request $request){

    }
}
