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
            $table->integer('taxiTypeId')->unsigned();
            $table->foreign('taxiTypeId')->references('id')->on('taxi_types');
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
