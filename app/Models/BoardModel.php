<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Connection;

class BoardModel extends Model
{
    use HasFactory;

    public const BOARD_WORD_MAPPINGS_TABLE = 'board_word_mappings';
    public const BOARD_FOLDER_MAPPINGS_TABLE = 'board_folder_mappings';

    protected $table = 'boards';

    public function items(int $board_id) {
            ///todo
    }
    public function words(int $board_id) {
        return $this->getConnection()->table(BoardModel::BOARD_WORD_MAPPINGS_TABLE)
            ->select('word_id')
            ->where('board_id', $board_id)
            ->get();
    }
    public function folders(int $board_id) {
        return $this->getConnection()->table(BoardModel::BOARD_FOLDER_MAPPINGS_TABLE)
            ->select('word_id')
            ->where('board_id', $board_id)
            ->get();
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
    public function __call($name_of_function, $arguments){
        if($name_of_function == 'removeItem'){

            switch(count($arguments)){
                case 1:
                    break;

                case 2:
                    break;
            }
        }
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


}
