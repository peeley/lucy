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

    public function items(int $board_id) {
        ///todo
    }

    public function words() {
        return $this->belongsToMany(
            Word::class,
            self::BOARD_WORD_MAPPINGS_TABLE,
            'board_id',
            'word_id'
        )->withPivot('board_position');
    }

    public function folders() {
        return $this->belongsToMany(
            Folder::class,
            self::BOARD_FOLDER_MAPPINGS_TABLE,
            'board_id',
            'folder_id'
        )->withPivot('board_position');
    }

    public function getHeight(int $board_id) {
        return $this->getConnection()->table($this->table)
            ->select('height')
            ->where('id', $board_id)
            ->get();
    }
    public function getWidth(int $board_id) {
        return $this->getConnection()->table($this->table)
            ->select('width')
            ->where('id', $board_id)
            ->get();
    }

    public function placeItem($item, $row, $column) {
        ///todo
    }

    public function swapItems($rowA, $columnA, $rowB, $columnB) {
        ///todo
    }
    public function getName(int $board_id) {
        return $this->getConnection()->table($this->table)
            ->select('name')
            ->where('id', $board_id)
            ->get();
    }
    public function setName(int $board_id, $name) {
        $this->getConnection()->table($this->table)
            ->where('id', $board_id)
            ->update(['name' => $name]);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
