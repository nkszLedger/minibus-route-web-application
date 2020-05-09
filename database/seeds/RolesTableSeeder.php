<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name' => 'None',
                'description' => 'This employee must not have access',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'Administrator',
                'description' => 'This employee shall register new employees, Create, Update, Remove Employees & Deactivate System users ONLY' ,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'Clerk',
                'description' => 'This employee shall register MiniBus Operators, Owners & Drivers ONLY',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'Auditor',
                'description' => 'This employee shall VIEW Dashboard, MiniBus Operators, Owners & Drivers ONLY',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
        ]);
    }
}
