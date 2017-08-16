<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVersionInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('version_info', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('versionCode');
	    $table->string('versionName');
	    $table->string('apkUrl');
            $table->timestamps();

            $table->index('versionCode');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('version_info');
    }
}
