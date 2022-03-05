<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Board extends TileContainer
{
    use HasFactory;

    protected $table = 'boards';

    // allow these properties to be passed to create()
    protected $fillable = [
        'name',
        'height',
        'width'
    ];

    // show these properties during JSON serialization
    protected $visible = [
        'name',
        'height',
        'width',
        'contents' // defined by `getContentsAttribute`
    ];

    // default values for these properties
    protected $attributes = [
        'width' => 7,
        'height' => 5
    ];

    // automatically load these relationships
    protected $with = [
        'words',
        'folders'
    ];

    public function words()
    {
        return $this->belongsToMany(
            Word::class,
        )->withPivot('board_x', 'board_y');
    }

    public function folders()
    {
        return $this->belongsToMany(
            Folder::class,
        )->withPivot('board_x', 'board_y');
    }

    public function placeItem($item, $row, $column)
    {
        ///todo
    }

    public function swapItems($rowA, $columnA, $rowB, $columnB)
    {
        ///todo
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function createCopy(): Board
    {
        $replicant = $this->replicate();

        return $replicant;
    }
}
