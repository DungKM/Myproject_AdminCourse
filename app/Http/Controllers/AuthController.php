<?php

namespace App\Http\Controllers;

use App\Events\UserRegisteredEvent;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function login()
    {
        return view('auth.login');
    }


    public function processLogin(Request $request)
    {
        try {
            $user = User::query()
                ->where('email', $request->get('email'))
                // ->where('password', $request->get('password'))
                ->firstOrFail();
            if (!Hash::check($request->get('password'), $user->password)) {
                // The passwords match...
                throw new Exception('Invalid password');
            }

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
    public function logout()
    {
        session()->flush();

        return redirect()->route('login');
    }
    public function register()
    {
        return view('auth.register');
    }
    public function processRegister(Request $request)
    {
        $user =  User::query()
            ->create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' =>  Hash::make($request->get('password')),
                'level' => 0
            ]);
        
        UserRegisteredEvent::dispatch($user);
    }
}