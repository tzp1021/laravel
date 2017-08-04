<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channels', function (Blueprint $table) {
            $table->string('id');
	    $table->integer('channel_id');
	    $table->integer('catalogId');
            $table->string('title')->nullable();
	    $table->string('sourceUrl')->nullable();
            $table->string('iconUrl')->nullable();
            $table->string('description')->nullable();
	    $table->integer('subscribe')->nullable();
	    $table->unsignedBigInteger('timeStamp')->nullable;
	    $table->timestamps();

	    $table->primary('id');
	    $table->unique('channel_id');
	    $table->foreign('catalogId')->references('id')->on('catalog')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('channels');
    }
}
