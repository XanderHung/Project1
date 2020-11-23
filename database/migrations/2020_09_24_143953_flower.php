<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Flower extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flower', function (Blueprint $table) {
            $table->bigIncrements('flowerid');
            $table->integer('categoryid')->unsigned();
            $table->foreign('categoryid')->references('categoryid')->on('category')->onUpdate('cascade')->onDelete('cascade');
            $table->string('flowername',50);
            $table->integer('price');
            $table->text('description');
            $table->mediumtext('flowerimage')->nullable();
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
        Schema::dropIfExists('flower');
    }
}
