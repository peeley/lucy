<?php

namespace App\Http\Controllers;

use App\Models\Word;
use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidException;
use App\Rules\hex_color;

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
            
        if ($type == 'word') {
            $tile = Word::find($tileId);

            if ($request->text != null) {
                $tile->update(['text' => $request->text]);
            }
        }

        if ($type == 'folder') {
            $tile = Folder::find($tileId);

            if ($request->text != null) {
                $tile->update(['name' => $request->text]);
            }
        }

        if ($request->color != null) {
            //$request->validate(['color' => new hex_color]);
            $tile->update(['color' => $request->color]);
        }

        if($request->image != 'undefined') {

            try{
                $image_submitted = $request->validate(['image' => 'mimes:jpg,jpeg,png|max:5048']);
                $path = $request->file('image')->storePublicly('images', 'public');
                $url = Storage::disk('public')->url($path);
                $tile->icon = $url;
            }
        
            catch(ValidException $exception) {
                return response()->json([
                    'msg' => 'Please submit file type of jpeg, jpg, or png.',
                    'errors' => $exception->errors()
                ], 422);
            }
        }

        $tile->save();

        return response()->json([
            'msg' => 'Tile Edited Successfully'
        ], 201);
    }

    public function addTileToFolder(Request $request, int $folder_id)
    {
        $folder = Folder::find($folder_id);

/*         if ($request->color != null)
        {
            $request->validate(['color' => new hex_color]);
        } */
      
        $url = NULL; 

        if($request->image != 'undefined') {

            try{
                $request->validate(['image' => 'mimes:jpg,jpeg,png|max:5048']);
                $image = $request->file('image');
                $path = $image->storePublicly('images', 'public');
                $url = Storage::disk('public')->url($path);
            }
            catch (ValidException $exception) {
                return response()->json([
                    'msg' => 'Please submit file type of jpeg, jpg, or png.'
                ], 422);
            }
        }

        $word = $folder->user()->first()->words()->create([
            'text' => $request->get('text'),
            'color' => $request->get('color'),
            'icon' => $url
        ]);

        $folder->words()->attach($word->id, [
            'board_x' => $request->get('board_x'),
            'board_y' => $request->get('board_y'),
        ]);

        return response('word created.');
    }
}
