<?php

namespace App\Http\Controllers;

use App\Models\Word;
use App\Models\Folder;
use Illuminate\Http\Request;

class FolderController extends Controller
{
    public function deleteTileFromFolder(Request $request, int $folder_id)
    {
        $folder = Folder::find($folder_id);
        $type = $request->tileType;
        $tileId = $request->tileId;

        if ($type == 'word') {
            $tile = Word::find($tileId);
            $folder->words()->detach($tile);
        }

        if ($type == 'folder') {
            $tile = Folder::find($tileId);
            $folder->folders()->detach($tile);
        }

        return response('tile deleted');
    }

    public function editTileFromFolder(Request $request, int $folder_id)
    {
        $type = $request->tileType;
        $tileId = $request->tileId;

        $request->validate(['image' => 'mimes:jpg,jpeg,png|max:5048']);

        if ($type == 'word') {
            $tile = Word::find($tileId);

            if ($request->text != null) {
                $tile->update(['text' => $request->text]);
            }

            if ($request->color != null) {
                $tile->update(['color' => $request->color]);
            }

            if ($request->image != null) {
                $path = request()->file('image')->store('images');
                $tile->icon = $path;
            } 
        }

        if ($type == 'folder') {
            $tile = Folder::find($tileId);

            if ($request->text != null) {
                $tile->update(['name' => $request->text]);
            }

            if ($request->color != null) {
                $tile->update(['color' => $request->color]);
            }
 
            if ($request->image != null) {
                $path = request()->file('image')->store('images');
                $tile->icon = $path;
            } 
        }
    }

    public function addTileToFolder(Request $request, int $folder_id)
    {
        $folder = Folder::find($folder_id);

        $word = $folder->user()->first()->words()->create([
            'text' => $request->get('text'),
            'color' => $request->get('color')
        ]);

        $folder->words()->attach($word->id, [
            'board_x' => $request->get('board_x'),
            'board_y' => $request->get('board_y'),
        ]);

        return response('word created.');
    }

}