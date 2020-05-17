<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'email' => 'lmakhi@dot.gov.za',
                'email_verified_at' => \Carbon\Carbon::now(),
                'password' => bcrypt('password'),
                'employee_id' => '2',
                'remember_token' => 'yes',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'email' => 'skunene@dot.gov.za',
                'email_verified_at' => \Carbon\Carbon::now(),
                'password' => bcrypt('password1'),
                'employee_id' => '3',
                'remember_token' => 'yes',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],

        ]);
    }
}
