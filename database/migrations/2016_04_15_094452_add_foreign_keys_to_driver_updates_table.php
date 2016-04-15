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
            $table->integer('state_id')->unsigned();
            $table->foreign('state_id')->references('id')->on('states');
            $table->integer('taxi_driver_user_id')->unsigned();
            $table->foreign('taxi_driver_user_id')->references('user_id')->on('taxi_drivers');
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
