<?php

use Illuminate\Database\Seeder;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            [
                'name' => 'Samuel',
                'surname' => 'Ngema',
                'id_number' => '0301030206081',
                'employee_id' => '678900',
                'phone_number' => '0124561210',
                'email' => 'sngema@dot.gov.za',
                'address_line' => '145 Anton Lambede Crescent',
                'postal_code' => '0184',
                'city_id' => '1',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],

        ]);
    }
}
