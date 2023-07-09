<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function store(Request $request){
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        if(!auth()->attempt($request->only('email', 'password'))){
            return redirect()->back()->with('error', 'Invalid Login details!');
        }

        //sign in
        return redirect()->route('dashboard');
    }

    public function logout(Request $request) {
        auth()->logout();
        return redirect('/login');
    }
}
