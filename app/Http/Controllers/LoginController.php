<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        // if user is already logged in, just go to home page
        if (Auth::check()) {
            return redirect('/home');
        }

        return view('login');
    }

    public function loginUser(Request $request)
    {
        $creds = $request->validate([
            'email' => 'email|required',
            'password' => 'string|required',
        ]);

        if (Auth::attempt($creds)) {
            // if authentication succeeds, go to home page
            return redirect('/home');
        }

        return back()->withErrors([
            'email' => 'The given credentials are incorrect.',
        ]);
    }
}
