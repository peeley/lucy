<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BoardFolderMappings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('board_folder_mappings', function (Blueprint $table){
            $table->id();

            $table->integer('board_id');
            $table->foreign('board_id')
                ->references('id')
                ->on('boards');

            $table->integer('word_id');
            $table->foreign('word_id')
                ->references('id')
                ->on('words');

            $table->text('board_position');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('board_folder_mappings');
    }
}
