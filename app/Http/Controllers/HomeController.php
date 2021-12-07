<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $boards = [(object) ['id' => 1, 'name' => 'Default board']];

        return view('home', [
            'name' => $user->name,
            'boards' => $boards
        ]);
    }
}
