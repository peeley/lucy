<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;

    protected $table = 'folders';

    public function words()
    {
        return $this->belongsToMany(
            WordModel::class,
            'folder_word',
            'folder_id',
            'word_id'
        )->withPivot('board_positions');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
