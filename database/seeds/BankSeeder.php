<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banks')->insert([
            [
                'name' => 'ABSA Bank',
                'universal_branch_code' => 632005,
            ],
            [
                'name' => 'African Bank Ltd',
                'universal_branch_code' => 430000,
            ],
            [
                'name' => 'Barclays Bank',
                'universal_branch_code' => 590000,
            ],
            [
                'name' => 'Bidvest Bank Limited',
                'universal_branch_code' => 462005,
            ],
            [
                'name' => 'Capitec Bank Ltd',
                'universal_branch_code' => 470010,
            ],
            [
                'name' => 'First National Bank',
                'universal_branch_code' => 250655,
            ],
            [	
                'name' => 'FirstRand Bank Ltd',
                'universal_branch_code' => 201419,
            ],
            [
                'name' => 'HSBC Bank',
                'universal_branch_code' =>	587000
            ],
            [
                'name' => 'Investec Bank Ltd',
                'universal_branch_code' =>	580105,
            ],
            [
                'name' => 'Mercantile Bank Limited',	
                'universal_branch_code' =>	450905,
            ],
            [
                'name' => 'Nedbank',
                'universal_branch_code' =>	198765,
            ],
            [
                'name' => 'Rand Merchant Bank',
                'universal_branch_code' =>	261251,
            ],
            [
                'name' => 'RMB Private Bank',
                'universal_branch_code' =>	222026,
            ],
            [
                'name' => 'South African Bank of Athens Limited',
                'universal_branch_code' =>	410506,
            ],
            [
                'name' => 'Standard Bank of SA Ltd',
                'universal_branch_code' =>	051001,
            ],
            [
                'name' => 'Standard Chartered Bank',
                'universal_branch_code' =>	730020,
            ],
        ]);
    }
}

/*
	

*/