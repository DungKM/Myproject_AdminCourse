<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function form() 
    {
       return view('form');
    }
    public function post(Request $request) 
    {
       $hello = $request ->get('hello');
       return view('show',[
         'hello'=> $hello
       ]);
    }

}
