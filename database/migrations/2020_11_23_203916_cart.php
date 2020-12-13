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
            $table->bigIncrements('cartid');
            $table->bigInteger('detailid')->unsigned();
            $table->foreign('detailid')->references('id')->on('detailcart')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('flowerid')->unsigned();
            $table->foreign('flowerid')->references('flowerid')->on('flower')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('cart');
    }
}
