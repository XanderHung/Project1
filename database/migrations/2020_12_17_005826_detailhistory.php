<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Detailhistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_history', function (Blueprint $table) {
            $table->increments('detailid');
            $table->integer('historyid')->unsigned();
            $table->foreign('historyid')->references('transactionid')->on('history')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('flowerid')->unsigned();
            $table->foreign('flowerid')->references('flowerid')->on('flower')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('quantity');
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
        Schema::dropIfExists('detail_history');
    }
}
