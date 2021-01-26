<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('school_types')->insert([
            [
                'type' => 'Ordinary School',
                'description' => 'Public & Private Schools',
            ],
            [
                'type' => 'LSEN',
                'description' => 'Schools for Learners with Special Needs',
            ],
        ]);
    }
}
