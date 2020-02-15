<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('players', function (Blueprint $table) {
            $table->foreign('teams_id')->references('id')->on('teams');

        });
        Schema::table('matches', function (Blueprint $table) {
            $table->foreign('team1_id')->references('id')->on('teams');
            $table->foreign('team2_id')->references('id')->on('teams');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('players', function (Blueprint $table) {
            $table->dropColumn('teams_id');
            $table->dropForeign('teams_id');

        });
        Schema::table('matches', function (Blueprint $table) {
            $table->dropColumn('team1_id');
            $table->dropForeign('team1_id');
            $table->dropColumn('team2_id');
            $table->dropForeign('team2_id');
        });
    }
}
