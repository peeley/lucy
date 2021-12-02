<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserSettings;

//how do we return the user settings for a specific user?

class UserSettingsController extends Controller
{
    public function getUserSettingsPage(Request $request)
    {
        return view('user-settings');
    }
}
