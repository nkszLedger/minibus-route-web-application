<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            [
                'country' => 'South Africa',
                'population' => 59308690,
                'land_area_km2' => 1213090	,
                'density_p_km2' => 49,
            ],
        ]);
    }
}
