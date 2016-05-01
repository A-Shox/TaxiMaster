<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToNewOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('new_orders', function (Blueprint $table) {
            $table->integer('taxiDriverUserId')->unsigned();
            $table->foreign('taxiDriverUserId')->references('id')->on('taxi_drivers');
            $table->integer('taxiOperatorUserId')->unsigned()->nullable();
            $table->foreign('taxiOperatorUserId')->references('id')->on('taxi_operators');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('new_orders', function (Blueprint $table) {
            //
        });
    }
}
