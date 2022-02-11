<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;

    protected $table = 'folders';

    // allow these properties to be passed to create()
    protected $fillable = [
        'name',
        'color',
        'icon'
    ];

    // make these properties visible on arrays made w/ toArray
    protected $visible = [
        'name',
        'color',
        'icon',
        'contents'
    ];

    // default values for these properties
    protected $attributes = [
        'color' => '#FFFFFF',
        'icon' => null
    ];

    // automatically load associated `words` and `folders`
    protected $with = [
        'words',
        'folders'
    ];

    // append this custom field to the serialized JSON
    protected $appends = [
        'contents'
    ];

    public function words()
    {
        return $this->belongsToMany(
            Word::class,
        )->withPivot('board_x', 'board_y');
    }

    // folders can each contain many folders - need to watch out for infinite
    // recursion
    public function folders()
    {
        return $this->belongsToMany(
            Folder::class,
            'folder_folder',
            'outer_folder_id',
            'inner_folder_id'
        )->withPivot('board_x', 'board_y');
    }

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
