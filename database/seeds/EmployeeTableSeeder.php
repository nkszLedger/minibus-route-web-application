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
        DB::table('employee')->insert([
            [
                'name' => 'Samuel',
                'surname' => 'Ngema',
                'id_number' => '0301030206081',
                'employee_id' => '678900',
                'phone_number' => '0124561210',
                'address_line' => '145 Anton Lambede Crescent',
                'postal_code' => '0184',
                'city_id' => '1',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'Lindi',
                'surname' => 'Makhi',
                'id_number' => '0201050204081',
                'employee_id' => '415623',
                'phone_number' => '0124567788',
                'address_line' => '145 Madiba Ave',
                'postal_code' => '0001',
                'city_id' => '2',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'Sizwe',
                'surname' => 'Kunene',
                'id_number' => '0708120915081',
                'employee_id' => '502344',
                'phone_number' => '0127004520',
                'address_line' => '109 Fraancis Baard Drive',
                'postal_code' => '0012',
                'city_id' => '1',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],

        ]);
    }
}
