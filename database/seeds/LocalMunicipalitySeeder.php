<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocalMunicipalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('local_municipalities')->insert([
            [
                'municipality_id' => 10001,
                'name' => 'CITY OF EKURHULENI METROPOLITAN MUNICIPALITY',
                'metropolitan_municipality_id' => 1,
                'description' => 'Local Municipality',
            ],
            [
                'municipality_id' => 10002,
                'name' => 'CITY OF JOHANNESBURG METROPOLITAN MUNICIPALITY',
                'metropolitan_municipality_id' => 2,
                'description' => 'Local Municipality',
            ],
            [
                'municipality_id' => 10003,
                'name' => 'CITY OF TSHWANE METROPOLITAN MUNICIPALITY',
                'metropolitan_municipality_id' => 3,
                'description' => 'Local Municipality',
            ],
            [
                'municipality_id' => 10004,
                'name' => 'RAND WEST LOCAL MUNICIPALITY',
                'metropolitan_municipality_id' => 4,
                'description' => 'Local Municipality',
            ],
            [
                'municipality_id' => 10005,
                'name' => 'MOGALE CITY LOCAL MUNICIPALITY',
                'metropolitan_municipality_id' => 4,
                'description' => 'Local Municipality',
            ],
            [
                'municipality_id' => 10006,
                'name' => 'MERAFONG CITY LOCAL MUNICIPALITY',
                'metropolitan_municipality_id' => 4,
                'description' => 'Local Municipality',
            ],
            [
                'municipality_id' => 10007,
                'name' => 'MIDVAAL LOCAL MUNICIPALITY',
                'metropolitan_municipality_id' => 5,
                'description' => 'Local Municipality',
            ],
            [
                'municipality_id' => 10008,
                'name' => 'EMFULENI LOCAL MUNICIPALITY',
                'metropolitan_municipality_id' => 5,
                'description' => 'Local Municipality',
            ],
            [
                'municipality_id' => 10009,
                'name' => 'LESEDI LOCAL MUNICIPALITY',
                'metropolitan_municipality_id' => 5,
                'description' => 'Local Municipality',
            ],
        ]);
    }
}
