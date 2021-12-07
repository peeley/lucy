<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BoardWord extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('board_word', function (Blueprint $table) {
            $table->id();

            $table->foreignId('board_id')
                ->constrained();

            $table->foreignId('word_id')
                ->constrained();

            $table->integer('board_position');

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
        Schema::dropIfExists('board_word');
    }
}
