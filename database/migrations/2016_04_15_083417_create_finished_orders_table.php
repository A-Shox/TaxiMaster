<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinishedOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finished_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('start_time');
            $table->timestamp('end_time');
            $table->text('start_location');
            $table->text('end_location');
            $table->double('distance', 10, 3);
            $table->string('customer_phone', 15);
            $table->integer('fare');
            $table->string('order_type', 10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('finished_orders');
    }
}
