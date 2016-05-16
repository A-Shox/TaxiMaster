<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StatesTableSeeder::class);
        $this->call(TaxiTypesTableSeeder::class);
        $this->call(TaxisTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TaxiDriverTableSeeder::class);
        $this->call(DriverUpdatesTableSeeder::class);
    }
}
