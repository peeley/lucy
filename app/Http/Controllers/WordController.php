<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Word;
use Illuminate\Http\Request;

class WordController extends Controller
{

    public function getUserWords(Request $request, int $user_id)
    {
        $user = User::find($user_id);
        if (!$user) {
            return response("User $user_id not found", 404);
        }

        $words = $user->words()->get();
        if (count($words) == 0) {
            return response("No words found for user $user", 404);
        }

        //placeholder for now; words will always be viewed on a board, right? we wont have stand alone words?
        $word_list = $words->toArray();

        return response()->json($word_list);
    }

    public function getWords(Request $request, int $word_id)
    {
        $word = Word::find($word_id);
        if (!$word) {
            return response("Word $word_id not found", 404);
        }

        //placeholder
        return response()->json($word->toArray());
    }

    public function createWord(Request $request)
    {
        $user = $request->user();

        $word = $user->words()->create([
            'user_id' => $user['id'],
            'text' => $request->get('text'),
            'color' => $request->get('color')
        ]);

        return response()->json($word->toArray());
    }

    public function index(Request $request)
    {
        return view('create-word');
    }

}
