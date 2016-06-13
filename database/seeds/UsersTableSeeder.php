<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new \App\User(['username'=>'admin', 'password'=>\Illuminate\Support\Facades\Hash::make('admin1234'), 'firstName'=>'Dulaj', 'lastName'=>'Atapattu', 'phone'=>'0777146646', 'userLevelId'=>1, 'isActive'=>true]))->save();
        (new \App\User(['username'=>'anuradha', 'password'=>\Illuminate\Support\Facades\Hash::make('anuradha1234'), 'firstName'=>'Anuradha', 'lastName'=>'Wickramrachchi', 'phone'=>'0715944191', 'userLevelId'=>2, 'isActive'=>true]))->save();
        (new \App\User(['username'=>'ravidu', 'password'=>\Illuminate\Support\Facades\Hash::make('ravidu1234'), 'firstName'=>'Ravidu', 'lastName'=>'Lashan', 'phone'=>'0712481879', 'userLevelId'=>2, 'isActive'=>true]))->save();
        (new \App\User(['username'=>'jayan', 'password'=>\Illuminate\Support\Facades\Hash::make('jayan1234'), 'firstName'=>'Jayan', 'lastName'=>'Vidanapathirana', 'phone'=>'0715594516', 'userLevelId'=>2, 'isActive'=>true]))->save();
        (new \App\User(['username'=>'eranga', 'password'=>\Illuminate\Support\Facades\Hash::make('eranga1234'), 'firstName'=>'Eranga', 'lastName'=>'Heshan', 'phone'=>'0715521984', 'userLevelId'=>2, 'isActive'=>true]))->save();
        (new \App\User(['username'=>'roshan', 'password'=>\Illuminate\Support\Facades\Hash::make('roshan1234'), 'firstName'=>'Roshan', 'lastName'=>'Madusanka', 'phone'=>'0715894672', 'userLevelId'=>2, 'isActive'=>true]))->save();
        (new \App\User(['username'=>'imesha', 'password'=>\Illuminate\Support\Facades\Hash::make('imesha1234'), 'firstName'=>'Imesha', 'lastName'=>'Sudasinghe', 'phone'=>'0717086160', 'userLevelId'=>2, 'isActive'=>true]))->save();
        (new \App\User(['username'=>'pasindu', 'password'=>\Illuminate\Support\Facades\Hash::make('pasindu1234'), 'firstName'=>'Pasindu', 'lastName'=>'Kanchana', 'phone'=>'0718739878', 'userLevelId'=>2, 'isActive'=>true]))->save();
        (new \App\User(['username'=>'kanchana', 'password'=>\Illuminate\Support\Facades\Hash::make('kanchana1234'), 'firstName'=>'Kanchana', 'lastName'=>'Ruwanpathirana', 'phone'=>'0714300800', 'userLevelId'=>2, 'isActive'=>true]))->save();
        (new \App\User(['username'=>'melanka', 'password'=>\Illuminate\Support\Facades\Hash::make('melanka1234'), 'firstName'=>'Melanka', 'lastName'=>'Sarod', 'phone'=>'0716984563', 'userLevelId'=>2, 'isActive'=>true]))->save();
        (new \App\User(['username'=>'keet', 'password'=>\Illuminate\Support\Facades\Hash::make('keet1234'), 'firstName'=>'Keet', 'lastName'=>'Sugathadasa', 'phone'=>'0778435878', 'userLevelId'=>2, 'isActive'=>true]))->save();
        (new \App\User(['username'=>'danuja', 'password'=>\Illuminate\Support\Facades\Hash::make('danuja1234'), 'firstName'=>'Danuja', 'lastName'=>'Jayawadena', 'phone'=>'0728333878', 'userLevelId'=>2, 'isActive'=>true]))->save();
        (new \App\User(['username'=>'sineth', 'password'=>\Illuminate\Support\Facades\Hash::make('sineth1234'), 'firstName'=>'Sineth', 'lastName'=>'Neranjana', 'phone'=>'0785739818', 'userLevelId'=>2, 'isActive'=>true]))->save();
        (new \App\User(['username'=>'nadun', 'password'=>\Illuminate\Support\Facades\Hash::make('nadun1234'), 'firstName'=>'Nadun', 'lastName'=>'Indunil', 'phone'=>'0718754178', 'userLevelId'=>2, 'isActive'=>true]))->save();
        (new \App\User(['username'=>'udara', 'password'=>\Illuminate\Support\Facades\Hash::make('udara1234'), 'firstName'=>'Udara', 'lastName'=>'Bibile', 'phone'=>'0718723678', 'userLevelId'=>2, 'isActive'=>true]))->save();
        (new \App\User(['username'=>'madhawa', 'password'=>\Illuminate\Support\Facades\Hash::make('madhawa1234'), 'firstName'=>'Madhawa', 'lastName'=>'Vidanapathirana', 'phone'=>'0756374125', 'userLevelId'=>3, 'isActive'=>true]))->save();
        (new \App\User(['username'=>'nimash', 'password'=>\Illuminate\Support\Facades\Hash::make('nimash1234'), 'firstName'=>'Nimash', 'lastName'=>'Dilanka', 'phone'=>'0721150439', 'userLevelId'=>3, 'isActive'=>true]))->save();
    }
}
