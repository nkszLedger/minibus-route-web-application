<?php

use Illuminate\Database\Seeder;

class VehicleTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicle_types')->insert([
            ['type' => 'Midibus'],
            ['type' => 'Minibus'],
            ['type' => 'Other'],
        ]);
    }
}
