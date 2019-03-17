<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class T001Players extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t001_players', function (Blueprint $table) {
            $table->bigIncrements('a001_id');
            $table->string('a001_name');
            $table->string('a001_surname');
            $table->string('a001_zip');
            $table->string('a001_number');
            $table->string('a001_address');
            $table->string('a001_neighbor');
            $table->string('a001_city');
            $table->string('a001_state');
            $table->string('a001_country');
            $table->date('a001_birthday');
            $table->string('a001_gender');
            $table->string('a001_email')->unique();
            $table->timestamps();
        });
        
//a001_name
//a001_surname
//a001_birthday
//a001_gender
//a001_email
//a001_zip
//a001_address
//a001_number
//a001_city
//a001_neighbor
//a001_state
//a001_country
        
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
