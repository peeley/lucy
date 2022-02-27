<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
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

    // automatically load these relationships
    protected $with = [
        'words',
        'folders'
    ];

    // append this custom field to the serialized JSON
    protected $appends = [
        'contents'
    ];

    // when this model gets serialized w/ toArray, a field called `contents`
    // will be populated with the result of this function
    public function getContentsAttribute()
    {
        $contents = $this->folders()->get()->concat($this->words()->get());

        $content_rows = $contents->groupBy(
            fn ($item) => $item->pivot->board_y
        )->sortKeys()->values();

        $sorted_rows = $content_rows->map(
            fn ($row) => $row->sortBy(fn ($item) => $item->pivot->board_x)
        );

        $expanded_sorted_contents = $sorted_rows->map(function ($row) {
            return $row->map(function ($item) {
                return $item->toArray();
            })->sortKeys()->values();
        });

        return $expanded_sorted_contents->toArray();
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
