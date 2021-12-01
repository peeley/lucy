<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function loginUser(Request $request)
    {
        $creds = $request->validate([
            'username' => 'string|required',
            'password' => 'string|required',
        ]);

        if (Auth::attempt($creds)) {
            // if authentication succeeds, go to home page
            return redirect('/home');
        }

        return back()->withErrors([
            'username' => 'The given credentials are incorrect.',
        ]);
    }
}
