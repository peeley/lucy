<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Word;
use App\Models\User;
use App\Models\Folder;
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

        $board_list = $boards->map(function ($board) {
            return ['name' => $board->name, 'id' => $board->id];
        })->toArray();

        return response()->json($board_list);
    }

    // TODO again, add authorization to view the board
    public function getBoardTiles(Request $request, int $board_id)
    {
        $board = Board::find($board_id);

        $sorted_board_tiles = $board->toArray();

        return response()->json($sorted_board_tiles);
    }

    public function getBoard(Request $request, int $board_id)
    {
        return view('board', ['board_id' => $board_id]);
    }

    public function deleteTileFromBoard(Request $request, int $board_id)
    {
        $board = Board::find($board_id);
        $type = $request->tileType;
        $tileId = $request->tileId;

        if ($type == 'word'){
            $tile = Word::find($tileId);
            $board->words()->detach($tile);
        }

        if ($type == 'folder'){
            $tile = Folder::find($tileId);
            $board->folders()->detach($tile);
        }

        return response('tile deleted');
    }
}