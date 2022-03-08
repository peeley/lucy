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

        $max_width = $contents->max('pivot.board_x');
        $max_height = $contents->max('pivot.board_y');

        $contents_array = [];

        for ($y = 1; $y <= $max_height; $y++) {
            $contents_array[$y - 1] = [];
            for ($x = 1; $x <= $max_width; $x++) {
                $tile_at_coords = $contents
                    ->where('pivot.board_x', $x)
                    ->firstWhere('pivot.board_y', $y);
                $contents_array[$y - 1][$x - 1] = $tile_at_coords
                    ? $tile_at_coords->toArray()
                    : 'blank';
            }
        }

        return $contents_array;
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
            $user->folders()->save($folder_copy);

            $replicant->folders()->attach($folder_copy, [
                'board_x' => $folder->pivot->board_x,
                'board_y' => $folder->pivot->board_y,
            ]);
        }

        return $replicant;
    }
}
