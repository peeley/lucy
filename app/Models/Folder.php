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

    public function words()
    {
        return $this->belongsToMany(
            Word::class,
            'folder_word',
            'folder_id',
            'word_id'
        )->withPivot('board_position');
    }

    // folders can each contain many folders - this might be gnarly
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
