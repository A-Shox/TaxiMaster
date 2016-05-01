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
            $table->timestamp('startTime');
            $table->timestamp('endTime');
            $table->text('startLocation');
            $table->text('endLocation');
            $table->double('distance', 10, 3);
            $table->string('customerPhone', 15);
            $table->integer('fare');
            $table->string('orderType', 10);
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
