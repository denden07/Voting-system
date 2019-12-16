<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContestantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contestants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname')->nullable();
            $table->integer('age')->nullable();
            $table->integer('sex_id');
            $table->integer('number');
            $table->string('contactNumber')->nullable();
            $table->string('address')->nullable();
            $table->integer('photo_id');
            $table->integer('event_id');
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
        Schema::dropIfExists('contestants');
    }
}
