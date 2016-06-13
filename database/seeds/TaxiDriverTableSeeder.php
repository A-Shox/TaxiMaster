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
        (new \App\TaxiDriver(['licenceNo'=>'15243A', 'id'=>'2', 'taxiId'=>1]))->save();
        (new \App\TaxiDriver(['licenceNo'=>'29845F', 'id'=>'3', 'taxiId'=>2]))->save();
        (new \App\TaxiDriver(['licenceNo'=>'34412G', 'id'=>'4', 'taxiId'=>3]))->save();
        
        (new \App\TaxiDriver(['licenceNo'=>'76864W', 'id'=>'5', 'taxiId'=>5]))->save();
        (new \App\TaxiDriver(['licenceNo'=>'15348C', 'id'=>'6', 'taxiId'=>6]))->save();
        (new \App\TaxiDriver(['licenceNo'=>'76895D', 'id'=>'7', 'taxiId'=>7]))->save();
        (new \App\TaxiDriver(['licenceNo'=>'16248X', 'id'=>'8', 'taxiId'=>8]))->save();
        
        (new \App\TaxiDriver(['licenceNo'=>'68348Z', 'id'=>'9', 'taxiId'=>9]))->save();
        (new \App\TaxiDriver(['licenceNo'=>'28348V', 'id'=>'10', 'taxiId'=>10]))->save();
        (new \App\TaxiDriver(['licenceNo'=>'81348Q', 'id'=>'11', 'taxiId'=>11]))->save();

        (new \App\TaxiDriver(['licenceNo'=>'41348Y', 'id'=>'12']))->save();
        (new \App\TaxiDriver(['licenceNo'=>'29348R', 'id'=>'13']))->save();
        (new \App\TaxiDriver(['licenceNo'=>'36348T', 'id'=>'14']))->save();
        (new \App\TaxiDriver(['licenceNo'=>'66348P', 'id'=>'15']))->save(); 
    }
}
