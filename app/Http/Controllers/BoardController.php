<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Word;
use App\Models\User;
use App\Models\Folder;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidException;

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
        $user = $request->user();
        if(!$user) {
            $default_guided_toggle = 1;
            $default_guided_idle = 30;
            $default_audio_level = 100;
            return view('board', [
                'user_id' => $user,
                'board_id' => $board_id,
                'audio_level' => $default_audio_level,
                'guided_use' => $default_guided_toggle,
                'idle_threshold' =>$default_guided_idle
            ]);
        }
        else {
            $user_settings = $user->settings()->get()->first();
            return view('board', [
                'user_id' => $user_settings->user_id,
                'board_id' => $board_id,
                'audio_level' => $user_settings->audio_level,
                'guided_use' => $user_settings->guided_use_toggle,
                'idle_threshold' =>$user_settings->idle_threshold,
            ]);
        }
        
    }

    public function deleteTileFromBoard(Request $request, int $board_id)
    {
        $board = Board::find($board_id);
        $type = $request->tileType;
        $tileId = $request->tileId;

        if ($type == 'word') {
            $board->words()->detach($tileId);
        }

        if ($type == 'folder') {
            $board->folders()->detach($tileId);
        }

        return response('tile deleted');
    }

    public function addTileToBoard(Request $request, int $board_id)
    {
        $board = Board::find($board_id);

        $word = $board->user()->first()->words()->create([
            'text' => $request->get('text'),
            'color' => $request->get('color')
        ]);

        $board->words()->attach($word->id, [
            'board_x' => $request->get('board_x'),
            'board_y' => $request->get('board_y'),
        ]);

        return response('word created.');
    }

    public function editTileFromBoard(Request $request, int $board_id)
    {
        $type = $request->tileType;
        $tileId = $request->tileId;

        if ($type == 'word') {
            $tile = Word::find($tileId);
            if ($request->text) {
                $tile->text = $request->text;
            }
        } else {
            $tile = Folder::find($tileId);

            if ($request->text) {
                $tile->name = $request->text;
            }
        }

        if ($request->color) {
            $tile->color = $request->color;
        }

        if($request->image != 'undefined') {

            try{
                $request->validate(['image' => 'mimes:jpg,jpeg,png|max:5048']);
                $image = $request->file('image');
                $path = $image->storePublicly('images', 'public');
                $url = Storage::disk('public')->url($path);
                $tile->icon = $url;
            }
            catch (ValidException $exception) {
                return response()->json([
                    'msg' => 'Please submit file type of jpeg, jpg, or png.'
                ], 422);
            }
        }

        $tile->save();

        return response()->json([
            'msg' => 'Tile Edited Successfully'
        ], 201); 
    }

    public function deleteBoard(Request $request, int $board_id)
    {
        if (!$user = Auth::user()) {
            return redirect('/login');
        }

        if (!$board = $user->boards->find($board_id)) {
            return response('Board not found.', 404);
        }

        $board->words()->detach();
        $board->folders()->detach();
        $board->delete();

        return redirect('/home')->with('success', "{$board->name} deleted.");
    }

    public function createBoard()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect('/login');
        }

        $default_copy = Board::find(1)->createCopyForUser($user);
        $user->boards()->save($default_copy);

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

        if (!$board = $user->boards()->find($board_id)) {
            return response("Board not found.", 404);
        }

        $board->fill($validated)->save();

        return redirect('/home')->with('success', 'Board updated.');
    }

    public function exportBoard(Request $request, int $board_id)
    {
        $board = Board::find($board_id);

        $obf_json = $board->exportToObf();

        Storage::put("public/obf/{$board_id}/{$board->name}.obf",
                     json_encode($obf_json, JSON_UNESCAPED_SLASHES));

        return Storage::download("public/obf/{$board_id}/{$board->name}.obf");
    }
}
