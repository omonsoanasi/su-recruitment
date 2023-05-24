<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateAuthController extends Controller
{
    public function userLogin(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }
        return redirect('/login')->with('message','Login details are not valid!');
    }
}
