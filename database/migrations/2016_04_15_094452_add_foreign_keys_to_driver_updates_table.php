<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToDriverUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('driver_updates', function (Blueprint $table) {
            $table->integer('stateId')->unsigned();
            $table->foreign('stateId')->references('id')->on('states');
            $table->integer('id')->unsigned();
            $table->foreign('id')->references('id')->on('taxi_drivers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('driver_updates', function (Blueprint $table) {
            //
        });
    }
}
