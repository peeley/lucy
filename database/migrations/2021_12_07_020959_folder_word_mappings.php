<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FolderWordMappings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('folder_word_mappings', function (Blueprint $table){
            $table->id();

            $table->integer('folder_id');
            $table->foreign('folder_id')
                ->references('id')
                ->on('folder_models');

            $table->integer('word_id');
            $table->foreign('word_id')
                ->references('id')
                ->on('words');

            $table->text('folder_position');

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
        Schema::dropIfExists('folder_word_mappings');
    }
}
