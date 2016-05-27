<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('origin', 50);
            $table->double('originLatitude', 8, 6);
            $table->double('originLongitude', 9, 6);
            $table->string('destination', 50);
            $table->double('destinationLatitude', 8, 6);
            $table->double('destinationLongitude', 9, 6);
            $table->timestamp('time');
            $table->string('contact', 15);
            $table->string('state', 10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('new_orders');
    }
}
