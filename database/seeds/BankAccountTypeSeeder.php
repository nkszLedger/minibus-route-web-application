<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BankAccountTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bank_account_types')->insert([
            [
                'description' => 'Current/Cheque',
            ],
            [
                'description' => 'Transmission',
            ],
            [
                'description' => 'Savings',
            ],
            [
                'description' => 'Other',
            ],
        ]);
    }
}
