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
                'full_name' => 'Mary Mgbede',
                'email' => 'adaamgbede@gmail.com',
                'role' => 'CTO',
                'password' => Hash::make(getenv('ADMIN_PASSWORD'))
            ],
            [
                'full_name' => 'Daniel Akadri',
                'email' => 'support@beetpool.com',
                'role' => 'system-administrator',
                'password' => Hash::make(getenv('ADMIN_PASSWORD'))
            ],
        ]);
    }
}


