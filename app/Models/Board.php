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
        'id',
        'contents' // defined by `getContentsAttribute`
    ];

    // default values for these properties
    protected $attributes = [
        'width' => 7,
        'height' => 5
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
}
