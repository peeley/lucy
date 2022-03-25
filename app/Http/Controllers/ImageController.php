<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getImage(Request $request, $image_path)
    {
        //if a user is not logged in, they cant access the image through that url.
        echo($request->user());
        return response('hello');
    }
}
