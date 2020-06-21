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
                'employee_number' => '678900',
                'phone_number' => '0124561210',
                'address_line' => '145 Anton Lambede Crescent',
                'email' => 'sngema@dot.gov.za',
                'emergency_contact_name' => 'Maggy Lapha',
                'emergency_contact_relationship' => 'Mother', 
                'emergency_contact_number' => '0129651230', 
                'surburb' => 'Centurion',
                'province_id' => '1', 
                'region_id' => '1002',
                'postal_code' => '0184',
                'position_id' => '1',
                'gender_id' => '1',
                'rank' => 'Taxi Rank PTA CBD',
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
                'email' => 'lmakhi@dot.gov.za',
                'emergency_contact_name' => 'Busi Makhi',
                'emergency_contact_relationship' => 'Spouse', 
                'emergency_contact_number' => '0123692587', 
                'surburb' => 'Hatfield',
                'province_id' => '1', 
                'region_id' => '1002',
                'postal_code' => '0001',
                'position_id' => '2',
                'gender_id' => '2',
                'rank' => 'Taxi Rank JHB CBD',
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
                'email' => 'skunene@dot.gov.za',
                'emergency_contact_name' => 'Mathi Jubilee',
                'emergency_contact_relationship' => 'Spouse', 
                'emergency_contact_number' => '0147892587', 
                'surburb' => 'Cosmos',
                'province_id' => '1', 
                'region_id' => '1001',
                'postal_code' => '0012',
                'position_id' => '3',
                'gender_id' => '1',
                'rank' => 'Taxi Rank DBN CBD',
                'city_id' => '1',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],

        ]);
    }
}
