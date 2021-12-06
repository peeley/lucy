<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boards', function (Blueprint $table) {
            $table->id();

            $table->uuid('board_id')
                    ->unique();

            $table->text("word");
            $table->foreign('word')
                ->references('word')
                ->on('words')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->integer('image_path');
            $table->foreign('image_path')
                ->references('path')
                ->on('images')
                ->onUpdate('CASCADE')
                ->onDelete('SET DEFAULT');

            $table->text('color') // TEXT == STRING in sqlite
                ->default('#000000');

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
        Schema::dropIfExists('boards');
    }
}
