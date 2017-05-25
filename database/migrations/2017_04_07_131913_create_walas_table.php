<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWalasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('walas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('nama_lengkap');
            $table->string('password');
            $table->integer
            $table->string('no_hp');
            $table->timestamps();
        });

       Schema::table('posts', function ($table) {
            $table->integer('user_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');
    }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('walas');
    }
}
