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
        /*$this->call(MembershipTypesTableSeeder::class);
        $this->call(RegionsTableSeeder::class);
        $this->call(AssociationsTableSeeder::class);
        $this->call(RoutesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(GenderTableSeeder::class);
        $this->call(ProvincesTableSeeder::class);
        $this->call(VehicleTypeTableSeeder::class);
        $this->call(DrivingLicenceCodeTableSeeder::class);
        $this->call(VehicleClassTableSeeder::class);
        $this->call(EmployeePositionTableSeeder::class);
        $this->call(FacilityMunicipalityTableSeeder::class);
        $this->call(FacilityTypeTableSeeder::class);
        $this->call(FacilityTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(EmployeeTableSeeder::class);
        $this->call(EmployeeVerificationTableSeeder::class);
        $this->call(EmployeeOrganizationTableSeeder::class);*/

        $this->call(CountrySeeder::class);
        $this->call(DistrictSeeder::class);
        $this->call(SchoolLevelSeeder::class);
        $this->call(SchoolTypeSeeder::class);
        $this->call(SchoolSectorSeeder::class);
        $this->call(MetropolitanMunicipalitySeeder::class);
        $this->call(LocalMunicipalitySeeder::class);
        $this->call(SchoolSeeder::class);
        $this->call(BankSeeder::class);
        $this->call(BankAccountTypeSeeder::class);
    }
}
