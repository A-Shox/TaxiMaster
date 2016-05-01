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
        (new \App\TaxiTypes(['name'=>"NANO_CAB"]))->save();
        (new \App\TaxiTypes(['name'=>"CAR"]))->save();
        (new \App\TaxiTypes(['name'=>"VAN"]))->save();
    }
}
