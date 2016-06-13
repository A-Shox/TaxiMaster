<?php

use Illuminate\Database\Seeder;

class NewOrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new \App\NewOrder(['origin' => 'Dehiwala', 'originLatitude' => 6.857396, 'originLongitude' => 79.861054, 'destination' => 'Borella', 'destinationLatitude' => 6.913795, 'destinationLongitude' => 79.880233, 'time' => '2016-06-08 07:12:00', 'contact' => '0712481879', 'state' => 'REJECTED', 'note' => 'Come on time', 'taxiDriverId' => 2]))->save();
        (new \App\NewOrder(['origin' => 'St. Thomas College', 'originLatitude' => 6.837703, 'originLongitude' => 79.865048, 'destination' => 'Kadawatha', 'destinationLatitude' => 7.002807, 'destinationLongitude' => 79.953426, 'time' => '2016-06-09 09:00:00', 'contact' => '0777146646', 'state' => 'ACCEPTED', 'note' => "Don't be late", 'taxiDriverId' => 4]))->save();
        (new \App\NewOrder(['origin' => 'Durdans Hospital', 'originLatitude' => 6.901936, 'originLongitude' => 79.853471, 'destination' => 'Kiribathgoda', 'destinationLatitude' => 6.977359, 'destinationLongitude' => 79.929676, 'time' => '2016-06-10 10:20:00', 'contact' => '0712755777', 'state' => 'NOW', 'note' => "Come on time. Don't be late", 'taxiDriverId' => 5]))->save();
        (new \App\NewOrder(['origin' => 'Galle face', 'originLatitude' => 6.924224, 'originLongitude' => 79.845248, 'destination' => 'Katubedda', 'destinationLatitude' => 6.801060, 'destinationLongitude' => 79.898331, 'time' => '2016-06-11 13:20:00', 'contact' => '0779874346', 'state' => 'NOW', 'note' => 'Come on time', 'taxiDriverId' => 6]))->save();
        (new \App\NewOrder(['origin' => 'Veyangoda', 'originLatitude' => 7.153226, 'originLongitude' => 80.066063, 'destination' => 'Bambalapitiya', 'destinationLatitude' => 6.897299, 'destinationLongitude' => 79.854347, 'time' => '2016-06-11 20:12:00', 'contact' => '0774562032', 'state' => 'REJECTED', 'note' => 'Come on time', 'taxiDriverId' => 3]))->save();
        (new \App\NewOrder(['origin' => 'Pettah', 'originLatitude' => 6.934180, 'originLongitude' => 79.855608, 'destination' => 'Kadawatha', 'destinationLatitude' => 7.003807, 'destinationLongitude' => 79.954426, 'time' => '2016-06-12 19:24:00', 'contact' => '078748920', 'state' => 'ACCEPTED', 'note' => 'Come on time. Hurry up.', 'taxiDriverId' => 6]))->save();
        (new \App\NewOrder(['origin' => 'Kadawatha', 'originLatitude' => 7.002807, 'originLongitude' => 79.953426, 'destination' => 'Dematagoda', 'destinationLatitude' => 6.938292, 'destinationLongitude' => 79.878998, 'time' => '2016-06-12 19:32:00', 'contact' => '072755777', 'state' => 'AVAILABLE', 'note' => 'Come on time. Hurry up.', 'taxiDriverId' => 5]))->save();
        (new \App\NewOrder(['origin' => 'Makola', 'originLatitude' => 6.978450, 'originLongitude' => 79.929705, 'destination' => 'Gampaha', 'destinationLatitude' => 7.091302, 'destinationLongitude' => 79.997378, 'time' => '2016-06-13 06:12:13', 'contact' => '0777132143', 'state' => 'PENDING', 'note' => 'Come on time. I want taxi on time', 'taxiDriverId' => 4]))->save();
        (new \App\NewOrder(['origin' => 'Kiribathgoda', 'originLatitude' => 6.977359, 'originLongitude' => 79.929676, 'destination' => 'Trace Expert City', 'destinationLatitude' => 6.929961, 'destinationLongitude' => 79.861552, 'time' => '2016-06-13 09:12:00', 'contact' => '0712481123', 'state' => 'ACCEPTED', 'note' => 'Come on time', 'taxiDriverId' => 4]))->save();
        (new \App\NewOrder(['origin' => 'Gampaha', 'originLatitude' => 7.091302, 'originLongitude' => 79.997378, 'destination' => 'Pettah', 'destinationLatitude' => 6.934180, 'destinationLongitude' => 79.855608, 'time' => '2016-07-13 18:34:00', 'contact' => '0712483461', 'state' => 'REJECTED', 'note' => 'Come on time', 'taxiDriverId' => 5]))->save();

    }
}
