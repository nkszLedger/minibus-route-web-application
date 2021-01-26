<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('school_levels')->insert([
            [
                'level' => 'Primary School',
                'description' => 'Grade RRR - Grade 7',
            ],
            [
                'level' => 'Secondary School',
                'description' => 'Grade 8 - Grade 12',
            ],
            [
                'level' => 'Combined School',
                'description' => 'Grade RRR - Grade 12',
            ],
            [
                'level' => 'Unspecified',
                'description' => 'School level may not be known',
            ],
        ]);
    }
}
