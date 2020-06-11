<?php

use Illuminate\Database\Seeder;

class VehicleClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicle_class')->insert([
            [
                'vehicle_type_id' => '3',
                'make' => 'Other',
                'model' => 'Other',
                'year' => 'N/A',
                'seats_number' => 'N/A'
            ],
            [
                'vehicle_type_id' => '2',
                'make' => 'Nissan',
                'model' => 'Urvan',
                'year' => '2001-2012',
                'seats_number' => '15'
            ],
            [
                'vehicle_type_id' => '2',
                'make' => 'Nissan',
                'model' => 'Impendulo',
                'year' => '2012-2020',
                'seats_number' => '15'
            ],
            [
                'vehicle_type_id' => '2',
                'make' => 'Toyota',
                'model' => 'Quantum',
                'year' => '2012-2020',
                'seats_number' => '15'
            ],
            [
                'vehicle_type_id' => '2',
                'make' => 'Toyota',
                'model' => 'Quantum',
                'year' => '2012-2020',
                'seats_number' => '13'
            ],
            [
                'vehicle_type_id' => '2',
                'make' => 'Volkswagen',
                'model' => 'T2/T3 Transporter',
                'year' => '1979-1992',
                'seats_number' => '10'
            ],
            [
                'vehicle_type_id' => '2',
                'make' => 'Volkswagen',
                'model' => 'T4 Transporter',
                'year' => '1990-2003',
                'seats_number' => '15'
            ],
            [
                'vehicle_type_id' => '2',
                'make' => 'Volkswagen',
                'model' => 'T5 Transporter',
                'year' => '2003-2015',
                'seats_number' => '15'
            ],
            [
                'vehicle_type_id' => '2',
                'make' => 'Volkswagen',
                'model' => 'T6 Transporter',
                'year' => '2015-2020',
                'seats_number' => '15'
            ],
            [
                'vehicle_type_id' => '1',
                'make' => 'Mercedez Benz',
                'model' => 'Sprinter',
                'year' => '2012-2020',
                'seats_number' => '22'
            ],
            
        ]);
    }
}
