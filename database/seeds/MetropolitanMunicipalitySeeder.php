<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MetropolitanMunicipalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('metropolitan_municipalities')->insert([
            [
                'name' => 'City of Ekurhuleni Metropolitan',
                'region_id' => 1001,
                'province_id' => 1,
                'description' => 'Registered Municipality Comment',
            ],
            [
                'name' => 'City of Johannesburg Metropolitan',
                'region_id' => 1002,
                'province_id' => 1,
                'description' => 'Registered Municipality Comment',
            ],
            [
                'name' => 'City of Tshwane Metropolitan',
                'region_id' => 1004,
                'province_id' => 1,
                'description' => 'Registered Municipality Comment',
            ],
            [
                'name' => 'West Rand District',
                'region_id' => 1005,
                'province_id' => 1,
                'description' => 'Registered Municipality Comment',
            ],
            [
                'name' => 'Sedibeng District',
                'region_id' => 1003,
                'province_id' => 1,
                'description' => 'Registered Municipality Comment',
            ],
        ]);
    }
}
