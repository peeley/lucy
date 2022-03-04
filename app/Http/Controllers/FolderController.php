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

        if ($type == 'word'){
            $tile = Word::find($tileId);
            $folder->words()->detach($tile);
        }

        if ($type == 'folder'){
            $tile = Folder::find($tileId);
            $folder->folders()->detach($tile);
        }

        return response('tile deleted');
    }
}
