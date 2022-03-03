<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        // TODO retrieve board from database, replace placeholder
        // should come up with a good way to recursively serialize folders
        return response()->json($sorted_board_tiles);
    }

    public function getBoard(Request $request, int $board_id)
    {
        return view('board', ['board_id' => $board_id]);
    }

    // FIXME make sure only owner of board can delete
    public function deleteBoard(Request $request, int $board_id)
    {
        if (!$user = Auth::user()) {
            return redirect('/login');
        }

        if (!$board = $user->boards->find($board_id)) {
            return response('Board not found.', 404);
        }

        $board->delete();

        return redirect('/home')->with('success', "{$board->name} deleted.");
    }

    public function createBoard()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect('/login');
        }

        // FIXME we can create copies of boards with `Board::replicate`, but
        // copying all the associated folders/words is insanely gnarly
        $user->boards()->create([
            'name' => 'Blank board',
            'width' => 5,
            'height' => 5,
        ]);

        return redirect('/home')->with('success', "Blank board created.");
    }

    public function editBoard(Request $request, int $board_id)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect('/login');
        }

        $validated = $request->validate([
            'name' => 'string|required',
            'height' => 'integer|required',
            'width' => 'integer|required'
        ]);

        $board = Board::find($board_id);

        if ($board->user()->get()->id !== $user->id) {
            return response("Cannot edit other user's board", 403);
        }

        $board->fill($validated);

        return redirect('/home')->with('success', 'Board updated.');
    }
}
