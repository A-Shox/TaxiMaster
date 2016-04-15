<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToFisnishedOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('finished_orders', function (Blueprint $table) {
            $table->integer('taxi_driver_user_id')->unsigned();
            $table->foreign('taxi_driver_user_id')->references('user_id')->on('taxi_drivers');
            $table->integer('taxi_id')->unsigned();
            $table->foreign('taxi_id')->references('id')->on('taxis');
            $table->integer('taxi_operator_user_id')->unsigned()->nullable();
            $table->foreign('taxi_operator_user_id')->references('user_id')->on('taxi_operators');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('finished_orders', function (Blueprint $table) {
            //
        });
    }
}
