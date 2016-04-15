<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToTaxisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('taxis', function (Blueprint $table) {
            $table->integer('taxi_type_id')->unsigned();
            $table->foreign('taxi_type_id')->references('id')->on('taxi_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('taxis', function (Blueprint $table) {
            //
        });
    }
}
