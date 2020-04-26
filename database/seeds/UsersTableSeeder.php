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
                'name' => 'Libra Lane',
                'email' => 'libra@example.com',
                'email_verified_at' => \Carbon\Carbon::now()   ,
                'password' => 'password'   ,
                'remember_token' => 'yes'  ,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],

        ]);
    }
}
