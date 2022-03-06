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
            function ($row) {
                $sorted_row = $row->sortBy(fn ($item) => $item->pivot->board_x)->values();
                return $sorted_row->map(fn ($item) => $item->toArray());
            }
        );

        return $sorted_rows->toArray();
    }

    public function createCopyForUser(User $user): TileContainer
    {
        $replicant = $this->replicate();
        $replicant->save();

        // there's not a `replicateMany` function so we have to replicate and
        // save each model one-by-one, pretty inefficient :(
        foreach ($this->words()->get() as $word) {
            $word_copy = $word->replicate();
            $user->words()->save($word_copy);

            $replicant->words()->attach($word_copy, [
                'board_x' => $word->pivot->board_x,
                'board_y' => $word->pivot->board_y,
            ]);
        }

        foreach ($this->folders()->get() as $folder) {
            $folder_copy = $folder->createCopyForUser($user);
            $user->folders()->save($folder);

            $replicant->folders()->attach($folder_copy, [
                'board_x' => $folder->pivot->board_x,
                'board_y' => $folder->pivot->board_y,
            ]);
        }

        return $replicant;
    }
}
