<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class MyController extends Controller
{
    public function contact()
    {
      $all_users= User::all();
      return view('contact' , compact('all_users'));
    }
}
