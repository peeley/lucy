<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FolderWord extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('folder_word', function (Blueprint $table) {
            $table->id();

            $table->foreignId('folder_id')
                ->constrained();

            $table->foreignId('word_id')
                ->constrained();

            $table->integer('board_x');
            $table->integer('board_y');

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
        Schema::dropIfExists('folder_word');
    }
}
