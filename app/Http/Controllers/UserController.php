<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Datatables;
use App\User;

class UserController extends Controller
{
  public function index(){
    return view('user.index');
  }

  public function allUsers(){
     return Datatables::of(User::query())->make(true);
  }
}
