<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function get(Request $request)
    {
        return view('welcome');
    }

    public function switchModes()
    {
        if (session()->has('isDark')) {
            session()->put('isDark', !session('isDark'));
        }
        else {
            session()->put('isDark', true);
        }

        return back();
    }
}
