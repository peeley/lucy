<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BoardModel;
use Illuminate\Support\Facades\DB;

class BoardController extends Controller
{
    protected const BOARD_TABLE = 'boards';

    public function getUserBoards(Request $request, int $user_id)
    {
        $boards = DB::table(self::BOARD_TABLE)->pluck('name', 'id');
        return $boards;
    }

    public function getBoard(Request $request, int $board_id)
    {
        return DB::table(self::BOARD_TABLE)
            ->where('id', '=', $board_id)
            ->get();
    }
}
