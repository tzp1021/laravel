<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->string('id');
	    $table->string('videoId')->nullable();
            $table->string('netSource');
            $table->integer('duration');
            $table->string('title')->nullable();
            $table->string('iconUrl')->nullable();
            $table->string('description')->nullable();
            $table->string('album')->nullable();
            $table->string('artist')->nullable();
            $table->string('genre')->nullable();
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
        Schema::drop('media');
    }
}
