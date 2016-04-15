<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToTaxiDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('taxi_drivers', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->primary('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('taxi_id')->unsigned();
            $table->foreign('taxi_id')->references('id')->on('taxis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('taxi_drivers', function (Blueprint $table) {
            //
        });
    }
}
