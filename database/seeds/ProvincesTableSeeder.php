<?php

use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provinces')->insert([
            [
                'name' => 'Gauteng',
            ],
            [
                'name' => 'Mpumalanga',
            ],
            [
                'name' => 'North-West',
            ],
            [
                'name' => 'Limpopo',
            ],
            [
                'name' => 'Free State',
            ],
            [
                'name' => 'Kwazulu Natal',
            ],
            [
                'name' => 'Western Cape',
            ],
            [
                'name' => 'Eastern Cape',
            ],
            [
                'name' => 'Northern Cape',
            ],
        ]);
    }
}
