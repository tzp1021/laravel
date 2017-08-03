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
	    $table->integer('catalogId');
            $table->string('title')->nullable();
	    $table->string('sourceUrl')->nullable();
            $table->string('iconUrl')->nullable();
            $table->string('description')->nullable();
	    $table->integer('subscribe')->nullable();
	    $table->timestamps();

	    $table->primary('id');
	    $table->index('catalogId');
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
