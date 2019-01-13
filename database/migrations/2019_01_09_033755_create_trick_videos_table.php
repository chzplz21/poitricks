<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrickVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trick_videos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('youtubeURL');
            $table->unsignedInteger('trick_name_id');
            $table->foreign('trick_name_id')->references('id')->on('trick_names');
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
        Schema::dropIfExists('trick_videos');
    }
}
