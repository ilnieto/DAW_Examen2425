<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function showLogin() {
        return view('frontend.login');
    }

    public function login(Request $request) {

        if(Auth::attempt(['email'=>$request->username , 'password'=>$request->password])) {

            if(Auth::user()->role == 'admin'){
                return redirect()->intended(route('admin_cartas'));
            }

            if(Auth::user()->role == 'cliente'){
                return redirect()->intended(route('catalogo'));
            }

        }

        return redirect()->route('login')->with( 'error' , 'Usuario o contraseña incorrecto.');

    }

    public function logout(Request $request) {

        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('login');

    }



}
