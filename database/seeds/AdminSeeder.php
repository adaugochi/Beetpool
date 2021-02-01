<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            [
                'full_name' => 'Adaa Mgbede',
                'email' => 'adaamgbede@gmail.com',
                'role' => 'CTO',
                'password' => Hash::make(getenv('ADMIN_PASSWORD'))
            ],
            [
                'full_name' => 'Daniel Akadri',
                'email' => 'Litefingers9@gmail.com',
                'role' => 'system-administrator',
                'password' => Hash::make(getenv('ADMIN_PASSWORD'))
            ],

            [
                'full_name' => 'Drems Sunday',
                'email' => 'wfrost047@gmail.com',
                'role' => 'system-administrator',
                'password' => Hash::make(getenv('ADMIN_PASSWORD'))
            ],
        ]);
    }
}


