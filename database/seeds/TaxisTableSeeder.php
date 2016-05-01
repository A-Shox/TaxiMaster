<?php

use Illuminate\Database\Seeder;

class TaxisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new \App\Taxi(['registeredNo'=>"WP-4521", 'model'=>'Nano Cab', 'noOfSeats'=>4, 'taxiTypeId'=>1]))->save();
        (new \App\Taxi(['registeredNo'=>"PA-3396", 'model'=>'Nano Cab', 'noOfSeats'=>4, 'taxiTypeId'=>1]))->save();
        (new \App\Taxi(['registeredNo'=>"QR-1653", 'model'=>'Nano Cab', 'noOfSeats'=>4, 'taxiTypeId'=>1]))->save();

        (new \App\Taxi(['registeredNo'=>"AA-1121", 'model'=>'Toyota Prius', 'noOfSeats'=>4, 'taxiTypeId'=>2]))->save();
        (new \App\Taxi(['registeredNo'=>"RS-6656", 'model'=>'Toyota Axio', 'noOfSeats'=>4, 'taxiTypeId'=>2]))->save();
        (new \App\Taxi(['registeredNo'=>"PR-2213", 'model'=>'Alto', 'noOfSeats'=>4, 'taxiTypeId'=>2]))->save();
        (new \App\Taxi(['registeredNo'=>"WS-9899", 'model'=>'Hyundai insight', 'noOfSeats'=>4, 'taxiTypeId'=>2]))->save();

        (new \App\Taxi(['registeredNo'=>"PK-7209", 'model'=>'Toyota KDH', 'noOfSeats'=>11, 'taxiTypeId'=>3]))->save();
        (new \App\Taxi(['registeredNo'=>"SD-7767", 'model'=>'Toyota KDH', 'noOfSeats'=>14, 'taxiTypeId'=>3]))->save();
        (new \App\Taxi(['registeredNo'=>"KP-4365", 'model'=>'Nissan Caravan', 'noOfSeats'=>14, 'taxiTypeId'=>3]))->save();
    }
}
