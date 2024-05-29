<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'Destanti',
            'email'=>'destantilakstiarini@gmail.com',
            'password'=>'123456',
            "phone_number"=>'083869249589',
            "address"=>'JL Gamelan Kidul No 10, Yogyakarta',
            "rules"=>'admin',
             
        ]);
    }
}
