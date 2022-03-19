<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function getImage(Request $request, $file_path)
    {
        //echo($file_path); 
        //$actual_path = config('filesystems.disks.local.root') . DIRECTORY_SEPARATOR . $url;
        return response()->file('/storage/app/images/' . $file_path);
    }
}
