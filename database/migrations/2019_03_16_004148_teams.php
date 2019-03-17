<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Teams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //criando tabel de times
        Schema::create('t002_teams', function (Blueprint $table) {
            $table->bigIncrements('a002_id');
            $table->string('a002_name');
            $table->string('a002_zip');            
            $table->string('a002_number');
            $table->string('a002_address');
            $table->string('a002_city');
            $table->string('a002_state');
            $table->string('a002_country');
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
