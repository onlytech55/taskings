<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [ 
            [
                'name' => 'Armando Casas',
                // 'email' => utf8_encode('armando@mañosos.com'),
                // $result = mb_convert_encoding($string, 'UTF-8', 'Windows-1252');
                // 'email' => mb_convert_encoding('armando@mañosos.com', 'UTF-8', 'Windows-1252'),
                'email' => 'armando@xn--maosos-xwa.com',
                'password' => bcrypt('12345678'),
                'profile_id' => 1, 
            ],
            [
                'name' => 'Carlos Pinto',
                // 'email' => 'carlos@mañosos.com',
                'email' => 'carlos@xn--maosos-xwa.com', 
                'password' => bcrypt('12345678'),
                'profile_id' => 2, 

            ],
        ];
     
       
        foreach($users as $u){
            User::create($u);
        }

    }
}
