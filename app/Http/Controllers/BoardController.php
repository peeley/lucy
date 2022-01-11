<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    // TODO need to add authorization, don't want to let users access each
    // other's boards
    public function getUserBoards(Request $request, int $user_id)
    {
        $user = User::find($user_id);

        if (!$user) {
            return response("User $user_id not found", 404);
        }

        $boards = $user->boards()->get();

        $board_list = $boards->map(function ($board, $idx) {
            return ['name' => $board->name, 'id' => $board->id];
        })->toArray();

        return response()->json($board_list);
    }

    public function getBoardTiles(Request $request, int $board_id)
    {
        // TODO retrieve board from database, replace placeholder
        // should come up with a good way to recursively serialize folders
        return response()->json([
            [
                ['type' => 'word', 'text' => 'Hello', 'color' => 'FF0000'],
                ['type' => 'word', 'text' => 'Goodbye', 'color' => '00FF00'],
                ['type' => 'word', 'text' => 'Yay!', 'color' => '00FF00'],
            ],
            [
                ['type' => 'folder', 'text' => 'Foods', 'color' => 'ffd700', 'contents' => [
                    [
                        ['type' => 'word', 'text' => 'Hamburger', 'color' => 'dd33dd'],
                        ['type' => 'folder', 'text' => 'Orange Foods', 'color' => 'e24908', 'contents' => [
                            [
                                ['type' => 'word', 'text' => 'Orange', 'color' => 'e24908'],
                            ],
                        ]],
                    ],
                ]],
                ['type' => 'word', 'text' => 'Ball', 'color' => 'fdb589'],
            ]
        ]);
    }

    public function getBoard(Request $request, int $board_id)
    {
        return view('board', ['board_id' => $board_id]);
    }
}
