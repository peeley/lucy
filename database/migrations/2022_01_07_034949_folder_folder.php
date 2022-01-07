<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FolderFolder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('folder_folder', function (Blueprint $table){
            $table->id();

            $table->foreignId('outer_folder_id')
                ->references('id')
                ->on('folders');

            $table->foreignId('inner_folder_id')
                ->references('id')
                ->on('folders');

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
        Schema::dropIfExists('folder_folder');
    }
}
