<?php

use Illuminate\Database\Seeder;

class FinishOrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new \App\FinishedOrder(['startTime'=>'2016-05-26 06:00:00', 'endTime'=>'2016-05-26 06:50:00', 'origin'=>'Mount Lavinia', 'destination'=>'Forte', 'distance'=>7.25, 'contact'=>'0715944191', 'fare'=>280, 'taxiDriverId'=>3, 'taxiId'=>1]))->save();
        (new \App\FinishedOrder(['startTime'=>'2016-05-26 07:15:00', 'endTime'=>'2016-05-26 08:15:00', 'origin'=>'Bambalapitiya', 'destination'=>'Peliyagoda', 'distance'=>12.5, 'contact'=>'0712481879', 'fare'=>470, 'taxiDriverId'=>2, 'taxiId'=>1]))->save();
        (new \App\FinishedOrder(['startTime'=>'2016-05-27 08:30:00', 'endTime'=>'2016-05-27 09:30:00', 'origin'=>'Mount Lavinia', 'destination'=>'Moratuwa', 'distance'=>4.5, 'contact'=>'0777146646', 'fare'=>180, 'taxiDriverId'=>3, 'taxiId'=>3]))->save();
        (new \App\FinishedOrder(['startTime'=>'2016-05-28 13:15:00', 'endTime'=>'2016-05-28 14:45:00', 'origin'=>'Kadawatha', 'destination'=>'Bambalapitiya', 'distance'=>21.4, 'contact'=>'0715143214', 'fare'=>1000, 'taxiDriverId'=>5, 'taxiId'=>4]))->save();
        (new \App\FinishedOrder(['startTime'=>'2016-06-01 18:00:00', 'endTime'=>'2016-06-01 19:30:00', 'origin'=>'Bambalapitiya', 'destination'=>'Makola', 'distance'=>22.5, 'contact'=>'0727653451', 'fare'=>1250, 'taxiDriverId'=>3, 'taxiId'=>5]))->save();
        (new \App\FinishedOrder(['startTime'=>'2016-06-05 06:10:00', 'endTime'=>'2016-06-05 07:00:00', 'origin'=>'Dehiwala', 'destination'=>'Forte', 'distance'=>11.25, 'contact'=>'0714765457', 'fare'=>850, 'taxiDriverId'=>2, 'taxiId'=>3]))->save();
        (new \App\FinishedOrder(['startTime'=>'2016-06-05 07:30:00', 'endTime'=>'2016-06-05 08:20:00', 'origin'=>'Forte', 'destination'=>'Kadawatha', 'distance'=>10.25, 'contact'=>'0785432654', 'fare'=>760, 'taxiDriverId'=>6, 'taxiId'=>6]))->save();
        (new \App\FinishedOrder(['startTime'=>'2016-06-05 13:10:00', 'endTime'=>'2016-06-05 14:05:00', 'origin'=>'Kiribathgoda', 'destination'=>'Wellawatta', 'distance'=>25.5, 'contact'=>'0724561236', 'fare'=>1500, 'taxiDriverId'=>8, 'taxiId'=>7]))->save();
        (new \App\FinishedOrder(['startTime'=>'2016-06-05 14:15:00', 'endTime'=>'2016-06-05 15:30:00', 'origin'=>'Makola', 'destination'=>'Kollupitiya', 'distance'=>24.25, 'contact'=>'0771346545', 'fare'=>1400, 'taxiDriverId'=>10, 'taxiId'=>8]))->save();
        (new \App\FinishedOrder(['startTime'=>'2016-06-05 15:00:00', 'endTime'=>'2016-06-05 15:54:00', 'origin'=>'Kadawatha', 'destination'=>'Gampaha', 'distance'=>13.6, 'contact'=>'0725941191', 'fare'=>750, 'taxiDriverId'=>12, 'taxiId'=>1]))->save();
        (new \App\FinishedOrder(['startTime'=>'2016-06-05 18:40:00', 'endTime'=>'2016-06-05 19:50:00', 'origin'=>'Mount Lavinia', 'destination'=>'Dematagoda', 'distance'=>17.25, 'contact'=>'0726934191', 'fare'=>800, 'taxiDriverId'=>11, 'taxiId'=>2]))->save();
        (new \App\FinishedOrder(['startTime'=>'2016-06-07 07:30:00', 'endTime'=>'2016-06-07 07:54:00', 'origin'=>'Moratuwa', 'destination'=>'Wellawatta', 'distance'=>10.34, 'contact'=>'0765943181', 'fare'=>400, 'taxiDriverId'=>5, 'taxiId'=>3]))->save();
        (new \App\FinishedOrder(['startTime'=>'2016-06-07 08:50:00', 'endTime'=>'2016-06-07 09:40:00', 'origin'=>'Katudebda', 'destination'=>'Kottawa', 'distance'=>11.75, 'contact'=>'0705344191', 'fare'=>440, 'taxiDriverId'=>4, 'taxiId'=>4]))->save();
        (new \App\FinishedOrder(['startTime'=>'2016-06-12 05:30:00', 'endTime'=>'2016-06-12 07:00:00', 'origin'=>'Sapugaskanda', 'destination'=>'Bambalapitiya', 'distance'=>22.4, 'contact'=>'0705944191', 'fare'=>1750, 'taxiDriverId'=>3, 'taxiId'=>5]))->save();
        (new \App\FinishedOrder(['startTime'=>'2016-06-12 06:00:00', 'endTime'=>'2016-06-12 07:00:00', 'origin'=>'Forte', 'destination'=>'Katubedda', 'distance'=>13.25, 'contact'=>'0715944191', 'fare'=>880, 'taxiDriverId'=>2, 'taxiId'=>3]))->save();
        (new \App\FinishedOrder(['startTime'=>'2016-06-12 07:10:00', 'endTime'=>'2016-06-12 08:00:00', 'origin'=>'Forte', 'destination'=>'Kadawatha', 'distance'=>15.63, 'contact'=>'0715432158', 'fare'=>780, 'taxiDriverId'=>5, 'taxiId'=>8]))->save();
        (new \App\FinishedOrder(['startTime'=>'2016-06-12 08:00:00', 'endTime'=>'2016-06-12 08:30:00', 'origin'=>'Ratmalana', 'destination'=>'Wellawatta', 'distance'=>8.4, 'contact'=>'0715945124', 'fare'=>350, 'taxiDriverId'=>2, 'taxiId'=>10]))->save();
        (new \App\FinishedOrder(['startTime'=>'2016-06-12 09:10:00', 'endTime'=>'2016-06-12 10:20:00', 'origin'=>'Pettah', 'destination'=>'Kiribathgoda', 'distance'=>8.4, 'contact'=>'0715643456', 'fare'=>360, 'taxiDriverId'=>6, 'taxiId'=>11]))->save();
        (new \App\FinishedOrder(['startTime'=>'2016-06-12 10:30:00', 'endTime'=>'2016-06-12 11:50:00', 'origin'=>'Makola', 'destination'=>'Wellawatta', 'distance'=>24.8, 'contact'=>'0715674321', 'fare'=>1200, 'taxiDriverId'=>7, 'taxiId'=>7]))->save();
        (new \App\FinishedOrder(['startTime'=>'2016-06-12 13:00:00', 'endTime'=>'2016-06-12 14:24:00', 'origin'=>'Kollupitiya', 'destination'=>'Kadawatha', 'distance'=>22.25, 'contact'=>'0773225441', 'fare'=>1340, 'taxiDriverId'=>9, 'taxiId'=>1]))->save();
        (new \App\FinishedOrder(['startTime'=>'2016-06-12 18:15:00', 'endTime'=>'2016-06-12 19:20:00', 'origin'=>'Bambalapitiya', 'destination'=>'Mahara', 'distance'=>25.5, 'contact'=>'0751653758', 'fare'=>1200, 'taxiDriverId'=>13, 'taxiId'=>2]))->save();
        (new \App\FinishedOrder(['startTime'=>'2016-06-12 20:00:00', 'endTime'=>'2016-06-12 21:30:00', 'origin'=>'Borella', 'destination'=>'Moratuwa', 'distance'=>24.25, 'contact'=>'0715444675', 'fare'=>1150, 'taxiDriverId'=>11, 'taxiId'=>3]))->save();
    }
}
