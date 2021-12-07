<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFolderModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('folder_models', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->text('name');
            $table->text('color');
            $table->binary('icon');

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
        Schema::dropIfExists('folder_models');
    }
}
