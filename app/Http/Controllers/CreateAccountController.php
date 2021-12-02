<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CreateAccountController extends Controller
{
    // return view for create account form
    public function index(Request $request)
    {
        return view('create-account');
    }

    public function createAccount(Request $request)
    {
        // make sure user-supplied email/password are valid
        $creds = $request->validate([
            'name' => 'string|required',
            'username' => 'email|required|unique:users,email',
            'password' => 'string|required',
        ]);

        // create user based on email and (hashed) password
        $user = User::create([
            'name' => $creds['name'],
            'email' => $creds['username'],
            'password' => Hash::make($creds['password']),
        ]);

        // log the new user in, and go to the home page
        Auth::login($user);

        return redirect('/home');
    }
}
