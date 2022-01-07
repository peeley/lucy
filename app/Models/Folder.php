<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;

    protected $table = 'folders';

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
        'words',
        'folders',
        'pivot'
    ];

    // auto-load all associated `words` and `folders` when calling toArray
    protected $with = [
        'words',
        'folders'
    ];

    public function words()
    {
        return $this->belongsToMany(
            Word::class,
            'folder_word',
            'folder_id',
            'word_id'
        )->withPivot('board_position');
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
        )->withPivot('board_position');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
