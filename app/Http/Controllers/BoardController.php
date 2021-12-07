<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BoardModel;
use App\Models\User;

class BoardController extends Controller
{
    protected const BOARD_TABLE = 'boards';

    public function getUserBoards(Request $request, int $user_id)
    {
        $boards = User::find($user_id)->boards()->get();
        return $boards;
    }

    public function getBoardTiles(Request $request, int $board_id)
    {
        $board  = BoardModel::find($board_id);

        return response()->json($board->serialize());
    }

    public function getBoard(Request $request, int $board_id)
    {
        return view('board', ['board_id' => $board_id]);
    }
}
