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
            $table->integer('id')->unsigned();
            $table->primary('id');
            $table->foreign('id')->references('id')->on('users');
            $table->integer('taxiId')->unsigned()->unique();
            $table->foreign('taxiId')->references('id')->on('taxis');
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
