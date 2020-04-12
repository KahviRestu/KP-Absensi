<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Auth;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auths.login');
    }

    public function postlogin(Request $request)
    {
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/dashboard');
        }
        return redirect('/login');
    }

    public function apilogin(Request $request)
    {
        
         if(Auth::attempt($request->only('email','password'))){
            $respon["success"] = 1;
            $respon["user"] = Auth()->user();

           return response()->json($respon);
        }
            return response()->json([
                "success" => 0,
                "error" => "Password salah"
            ]);
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
