<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $boards = $user->boards()->get()->sortBy('id');

        return view('home', [
            'name' => $user->name,
            'boards' => $boards
        ]);
    }
}
