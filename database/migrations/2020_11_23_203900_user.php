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
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->mediumText('address');
            $table->string('gender');
            $table->date('dob');
            $table->integer('roleid')->unsigned();
            $table->foreign('roleid')->references('roleid')->on('roletype')->onUpdate('cascade')->onDelete('cascade');
            $table->rememberToken();
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
