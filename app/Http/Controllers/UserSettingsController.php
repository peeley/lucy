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

    public function updateSettings(Request $request)
    {
        $user = $request->user();
        $user_settings = $user->settings()->get()->first();
        
        //checking which values were updated
        if ($request->has('guided_use'))
        {
            $user_settings->update(['guided_use_toggle'=> $request->guided_use]);
        }

        if ($request->has('audio_level'))
        {
            $user_settings->update(['audio_level' => $request->audio_level]);
        }

        return view('user-settings', ['audio_level'=> $user_settings->audio_level, 'guided_use_toggle'=> $user_settings->guided_use_toggle]);
    }
}
