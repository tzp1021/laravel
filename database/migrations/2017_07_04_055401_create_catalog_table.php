<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalog', function (Blueprint $table) {
            $table->integer('id');
	    $table->string('code');
	    $table->string('title')->nullable();
	    $table->string('description')->nullable();
	    $table->string('coverUrl')->nullable();
	    $table->unsignedBigInteger('timeStamp')->nullable;
	    $table->timestamps();

	    $table->primary('id');
	    $table->index('code');
	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('catalog');
    }
}
