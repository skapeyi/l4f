<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccesslogController extends Controller
{
  
  public function index(){
    return view('access.index');
  }
}
