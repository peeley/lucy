<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function getUserBoards(Request $request, int $user_id)
    {
        // TODO retrieve boards belonging to user
        return response()->json([
            ['name' => 'board1', 'id' => 1],
            ['name' => 'board2', 'id' => 2],
            ['name' => 'board3', 'id' => 3],
        ]);
    }

    public function getBoardTiles(Request $request, int $board_id)
    {
        // TODO retrieve board from database, replace placeholder
        // should come up with a good way to recursively serialize folders
        return response()->json([
            [
                ['type' => 'word', 'text' => 'hello!', 'color' => 'FF0000'],
                ['type' => 'word', 'text' => 'goodbye!', 'color' => '00FF00'],
                ['type' => 'word', 'text' => 'goodbye!', 'color' => '00FF00'],
            ],
            [
                ['type' => 'folder', 'text' => 'foods', 'color' => 'ffd700', 'contents' => [
                    [
                        ['type' => 'word', 'text' => 'hamborgar', 'color' => 'dd33dd'],
                        ['type' => 'folder', 'text' => 'orange foods', 'color' => 'e24908', 'contents' => [
                            [
                                ['type' => 'word', 'text' => 'oranges', 'color' => 'e24908'],
                            ],
                        ]],
                    ],
                ]],
                ['type' => 'word', 'text' => 'ball', 'color' => 'fdb589'],
            ]
        ]);
    }

    public function getBoard(Request $request, int $board_id)
    {
        return view('board', ['board_id' => $board_id]);
    }
}
