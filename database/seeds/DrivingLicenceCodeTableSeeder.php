<?php

use Illuminate\Database\Seeder;

class DrivingLicenceCodeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('driving_licence_codes')->insert([
            [
                'code' => 'A1',
                'class' => 'Motorcycles with an engine capacity of 125 cubic centimetres or less',
                'category' => 'Motorcycles',
                'includes' => ''
            ],
            [
                'code' => 'A',
                'class' => 'Motorcycles with an engine capacity greater than 125 cc',
                'category' => 'Motorcycles',
                'includes' => 'Code A1'
            ],
            [
                'code' => 'B',
                'class' => 'Vehicles (except motorcycles) with tare weight of 3,500 kilograms or less; 
                            and minibuses, buses and goods vehicles with gross vehicle mass 
                            (GVM) of 3,500 kg or less. A trailer with GVM of 750 kg or less may be attached.',
                'category' => 'Light motor vehicles',
                'includes' => ''
            ],
            [
                'code' => 'EB',
                'class' => 'Articulated vehicles with gross combination mass (GCM) of 3,500 kg or less; 
                            and vehicles allowed by Code B but with a trailer with GVM greater than 750 kg.',
                'category' => 'Light motor vehicles',
                'includes' => 'Code B'
            ],
            [
                'code' => 'C1',
                'class' => 'In South Africa, driving licences are issued with various codes that 
                            indicate the types of vehicle that may be driven with that licence. 
                            To transport fare-paying passengers or tourists for a fee, 
                                you must have a professional driving permit (PrDP). 
                                For example, a Code EC1 licence includes codes B, EB and C1.',
                'category' => 'Heavy motor vehicles',
                'includes' => 'Code B'
            ],
            [
                'code' => 'C',
                'class' => 'Buses and goods vehicles with GVM greater than 16,000 kg. 
                                A trailer with GVM of 750 kg or less may be attached.',
                'category' => 'Heavy motor vehicles',
                'includes' => 'Codes B and C1'
            ],
            [
                'code' => 'EC1',
                'class' => 'Articulated vehicles with GCM between 3,500 kg and 16,000 kg; 
                            and vehicles allowed by Code C1 but with a trailer with GVM greater than 750 kg. ',
                'category' => 'Heavy motor vehicles',
                'includes' => 'Codes B, EB and C1 '
            ],
            [
                'code' => 'EC',
                'class' => 'Articulated vehicles with GCM greater than 18,000 kg; 
                            and vehicles allowed by Code C but with a trailer with GVM greater than 750 kg. ',
                'category' => 'Heavy motor vehicles',
                'includes' => 'Codes B, EB, C1, C and EC1 '
            ],
            
        ]);
    }
}
