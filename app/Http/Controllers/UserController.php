<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{


    public function __construct(){
        $this->middleware('guest')->except('logout'); 
    }

    public function getLogin(){
        
        return view('login');
    }

    public function login(){
        $credentials=$this->validate(request(),
        ['email'=>'email|required|string',
        'password'=>'required|string']);

        if (Auth::attempt($credentials)){ 
            return redirect()->intended('/');
        }
        return back()
        ->withErrors(['email'=>'Estas credenciales no concuerdan con nuestros registros.'])
        ->withInput(request(['email']));
    }



    public function logout(){
        Auth::logout();
        return redirect('/');
    }


}