<?php

use Illuminate\Database\Seeder;

class TaxiTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new \App\TaxiTypes(['name'=>"Nano"]))->save();
        (new \App\TaxiTypes(['name'=>"Car"]))->save();
        (new \App\TaxiTypes(['name'=>"Van"]))->save();
    }
}
