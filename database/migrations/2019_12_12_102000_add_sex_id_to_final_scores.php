<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSexIdToFinalScores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('final_scores', function (Blueprint $table) {
            //
            $table->integer('sex_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('final_scores', function (Blueprint $table) {
            //
            $table->integer('sex_id');
        });
    }
}
