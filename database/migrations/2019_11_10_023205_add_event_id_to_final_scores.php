<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEventIdToFinalScores extends Migration
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
            $table->integer('event_id');
            $table->integer('round_id');
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

            $table->dropForeign('event_id');
            $table->dropForeign('round_id');

        });
    }
}
