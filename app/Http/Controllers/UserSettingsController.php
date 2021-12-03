<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserSettings;

//how do we return the user settings for a specific user?

class UserSettingsController extends Controller
{
    public function getUserSettingsPage(Request $request)
    {
        $user = $request->user();
        $user_settings = $user->settings()->get()->first(); //am not entirely sure if this is the best way to get the specific settings for the user
        return view('user-settings', ['audio_level'=> $user_settings->audio_level, 'guided_use_toggle'=> $user_settings->guided_use_toggle]);
    }
}
