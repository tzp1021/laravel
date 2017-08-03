<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChannelMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channel_media', function (Blueprint $table) {
            $table->string('id');
	    $table->string('channelId');
	    $table->string('mediaId');
	    $table->timestamps();

	    $table->primary('id');
	    $table->foreign('channelId')->references('id')->on('channels')->onDelete('cascade');
	    $table->foreign('mediaId')->references('id')->on('media')->onDelete('cascade');
	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('channel_media');
    }
}
