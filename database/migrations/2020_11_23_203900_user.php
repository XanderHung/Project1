<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class User extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->bigIncrements('userid');
            $table->string('username');
            $table->string('email');
            $table->string('password');
            $table->mediumText('address');
            $table->string('gender');
            $table->date('dob');
            $table->integer('roleid');
            $table->foreign('roleid')->references('roleid')->on('roletype')->onUpdate('cascade')->onDelete('cascade');
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
