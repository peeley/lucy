<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    protected $table = 'boards';

    protected $fillable = [
        'name',
        'height',
        'width'
    ];

    protected $visible = [
        'name',
        'height',
        'width',
        'words',
        'folders'
    ];

    protected $attributes = [
        'width' => 7,
        'height' => 5
    ];

    protected $with = [
        'words',
        'folders'
    ];

    public function items()
    {
        $folders = $this->folders()->get();

        $words = $this->words()->get();

        return $folders->concat($words);
    }

    public function getSortedContents()
    {
        $items = $this->items();

        $item_rows = $items->groupBy(fn ($item) => $item->pivot->board_y);

        $sorted_item_rows = $item_rows->map(
            fn ($row) => $row->sortBy(fn ($item) => $item->pivot->board_x)
        );

        return $sorted_item_rows->values()->toArray();
    }

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
