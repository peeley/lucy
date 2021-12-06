<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //to do: more columns need to be added, but this should be sufficient for the demo
        Schema::create('user_settings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('guided_use_toggle')->default('false'); //lets us know whether the user wants guided use on or off
            $table->integer('audio_level')->default('5'); //the volume level of the text-to-speech voice; not sure if we should use int or float
            $table->foreignID('user_id')->constrained(); //users settings cannot exist without a user
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_settings');
    }
}
