<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TileContainer extends Model
{
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
}
