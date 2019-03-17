<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class T003Teamplayers extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //criando tabel de times
        Schema::create('t003_teamplayers', function (Blueprint $table) {
            $table->bigIncrements('a003_id');
            $table->string('a001_id');
            $table->string('a002_id');
            $table->string('a003_salary');
            $table->string('a003_position');
            $table->timestamps();
        });
        DB::select(
                "CREATE VIEW vw_teamplayers as
                SELECT b.a002_name, b.a002_city, b.a002_state, concat(c.a001_name,' ',c.a001_surname) as playername, a.a003_position, a.a003_salary
                FROM t003_teamplayers a, t002_teams b, t001_players c
                WHERE a.a002_id=b.a002_id and a.a001_id=c.a001_id
                ORDER BY a.a002_id");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
    }

}
