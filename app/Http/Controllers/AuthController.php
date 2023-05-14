<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class AuthController extends Controller
{
    //
    public function login(){
        return view('auth.login');
    }
    
    
    public function processLogin(Request $request){
        try {
            $user = User::query()
            ->where('email',$request->get('email'))
            ->where('password',$request->get('password'))
            ->firstOrFail();

            session()->put('id', $user->id);
            session()->put('name', $user->name);
            session()->put('level', $user->level);
            session()->put('avatar', $user->avatar);
            
            return redirect()->route('courses.index');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('login');
          
            
        }
       
    }
    public function logout(){
        session()->flush();

        return redirect()->route('login');
    }
}