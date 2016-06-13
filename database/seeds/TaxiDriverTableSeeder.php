<?php

use Illuminate\Database\Seeder;

class TaxiDriverTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new \App\TaxiDriver(['licenceNo'=>'34512A', 'id'=>'2', 'taxiId'=>1]))->save();
        (new \App\TaxiDriver(['licenceNo'=>'55341A', 'id'=>'3', 'taxiId'=>4]))->save();
    }
}
