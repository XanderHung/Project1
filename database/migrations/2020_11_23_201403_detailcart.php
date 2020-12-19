<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Detailcart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailcart', function (Blueprint $table) {
            $table->increments('detailid');
            $table->bigInteger('userid')->unsigned();
            $table->foreign('userid')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('done');
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
        Schema::dropIfExists('detailcart');
    }
}
