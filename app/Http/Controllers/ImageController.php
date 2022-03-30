<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//tried to structure this so that if a user wasnt logged in, they couldnt view the url. but that did not work.
class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getImage(Request $request, $image_path)
    {
        echo($request->user());
        return response('hello');
    }
}
