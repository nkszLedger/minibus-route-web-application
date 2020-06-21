<?php

use Illuminate\Database\Seeder;

class EmployeePositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employee_positions')->insert([
            ['position' => 'Rank Manager'],
            ['position' => 'Rank Coordinator'],
            ['position' => 'Rank Marshall']
        ]);
    }
}
