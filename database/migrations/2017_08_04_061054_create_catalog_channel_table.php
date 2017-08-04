<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogChannelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalog_channel', function (Blueprint $table) {
            $table->string('id');
            $table->integer('catalogId');
            $table->string('channelId');
            $table->timestamps();

            $table->primary('id');
            $table->foreign('catalogId')->references('id')->on('catalog')->onDelete('cascade');
            $table->foreign('channelId')->references('id')->on('channels')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('catalog_channel');
    }
}
