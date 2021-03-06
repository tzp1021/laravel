<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportmediaerrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mediaerr', function(Blueprint $table) {
	    $table->increments('id');
	    $table->string('mediaId');
	    $table->string('msg');
	    $table->timestamps();

	    $table->index('mediaId');
	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mediaerr');
    }
}
