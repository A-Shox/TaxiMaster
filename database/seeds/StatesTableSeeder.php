<?php

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new \App\State(['name'=>'AVAILABLE']))->save();
        (new \App\State(['name'=>'GOING_FOR_HIRE']))->save();
        (new \App\State(['name'=>'IN_HIRE']))->save();
    }
}
