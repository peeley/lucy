<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function getUserBoards(Request $request, int $user_id)
    {
        // TODO retrieve boards belonging to user
        return response()->json([
            ['name' => 'Board 1', 'id' => 1],
            ['name' => 'Board 2', 'id' => 2],
            ['name' => 'Board 3', 'id' => 3],
        ]);
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
