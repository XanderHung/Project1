<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->increments('cartid');
            $table->bigInteger('flowerid');
            $table->foreign('flowerid')->references('flowerid')->on('flower')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('userid');
            $table->foreign('userid')->references('userid')->on('user')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('Quantity');
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
        //
    }
}
