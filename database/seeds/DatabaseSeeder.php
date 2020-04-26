<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MembershipTypesTableSeeder::class);
        $this->call(RegionsTableSeeder::class);
        $this->call(AssociationsTableSeeder::class);
        $this->call(RoutesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(UsersTableSeeder::class);

    }
}
