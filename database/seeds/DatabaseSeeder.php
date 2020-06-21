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
        $this->call(PermissionTableSeeder::class);
        $this->call(GenderTableSeeder::class);
        $this->call(ProvincesTableSeeder::class);
        $this->call(VehicleTypeTableSeeder::class);
        $this->call(DrivingLicenceCodeTableSeeder::class);
        $this->call(VehicleClassTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(EmployeePositionTableSeeder::class);
        $this->call(EmployeeTableSeeder::class);
        


    }
}
