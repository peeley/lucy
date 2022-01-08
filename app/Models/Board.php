<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    public const BOARD_WORD_MAPPINGS_TABLE = 'board_word';
    public const BOARD_FOLDER_MAPPINGS_TABLE = 'board_folder';

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

    protected $with = [
        'words',
        'folders'
    ];

    public function items()
    {
        ///todo
    }

    public function words()
    {
        return $this->belongsToMany(
            Word::class,
            self::BOARD_WORD_MAPPINGS_TABLE,
            'board_id',
            'word_id'
        )->withPivot('board_position');
    }

    public function folders()
    {
        return $this->belongsToMany(
            Folder::class,
            self::BOARD_FOLDER_MAPPINGS_TABLE,
            'board_id',
            'folder_id'
        )->withPivot('board_position');
    }

    public function getHeight()
    {
        return $this->height;
    }
    public function getWidth()
    {
        return $this->width;
    }

    public function placeItem($item, $row, $column)
    {
        ///todo
    }

    public function swapItems($rowA, $columnA, $rowB, $columnB)
    {
        ///todo
    }
    public function getName()
    {
        return $this->name;
    }
    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
