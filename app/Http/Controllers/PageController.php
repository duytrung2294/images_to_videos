<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    
    public function getIndex() {
        return view('index');
    }

    public function getLogin() {
        if(Auth::check()) {
            return redirect('/');
        }
        return view('auth.login');
    }

    public function postLogin(Request $request) {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($credentials)) {
            return redirect(route('home'));
        }else {
            return redirect(route('login'))->with('fail_mess', 'Wrong email or password!!');
        }
    }

    public function getRegister() {
        if(Auth::check()) {
            return redirect('/');
        }
        return view('auth.register');
    }

    public function postRegister(Request $request) {
        $this->validate($request, [
            'email' => 'unique:users,email'
        ], [
            "email.unique" => "Each person must have a unique e-mail address"
        ]); 

        $user = new User;
        $user->name = $request->user_name;
        $user->email = $request->email;
        $user->password   = bcrypt($request->password);
        $user->save();
        return redirect('register')->with("messages", "Register success!");
    }   
}
