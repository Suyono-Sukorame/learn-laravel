<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Session;

class AuthController extends Controller
{
    
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)) {
            return redirect('posts');
        } else {
            return redirect('login')->with('error_message', 'Wrong email or password');  // Corrected typo in 'error_message'
        }    
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        
        return redirect('login');
    }

    public function register_form()
    {      
        return view('auth.register');
    }
    public function register()
    {      
        // return view('auth.register');
    }

}
