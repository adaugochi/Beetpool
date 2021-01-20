<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaction_types')->insert([
            ['id' => 1, 'key' => 'deposit', 'name' => 'Deposit'],
            ['id' => 2, 'key' => 'investment', 'name' => 'Investment'],
            ['id' => 3, 'key' => 'top-up', 'name' => 'Top Up'],
            ['id' => 4, 'key' => 'withdrawal', 'name' => 'Withdraw'],
            ['id' => 5, 'key' => 'trading-bonus', 'name' => 'Trading Bonus'],
            ['id' => 6, 'key' => 'purchase', 'name' => 'Purchase'],
        ]);
    }
}
