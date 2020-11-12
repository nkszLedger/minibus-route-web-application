<?php

namespace App\Http\Controllers;

use App\Vehicle;
use App\Route;
use App\Association;
use App\Employee;
use App\EmployeeOrganization;
use App\EmployeePosition;
use App\EmployeeVerification;
use App\Facility;
use App\Member;
use App\MemberDriver;
use App\MemberOperator;
use App\MemberRegionAssociation;
use App\MemberVehicle;
use App\Region;
use App\RouteVehicle;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Retrives all employees by facility
     *  
     * @see getEmployeesPositionByFacilityOnly()
     * @param[in] position_id
     * @param[in] facility_id
     * @return Employees
     */
    private function getEmployeesPositionByFacilityOnly($position_id, $facility_id)
    {
        $employees = DB::table('employees')
            ->select('employees.name', 'employees.surname')
            ->where('position_id', $position_id)
            ->where('employee_organizations.facility_taxi_rank_id', $facility_id)
            ->join('employee_organizations', 'employees.id', '=', 'employee_organizations.employee_id')
            ->join('facility', 'employee_organizations.facility_taxi_rank_id', '=', 'facility.id')
            ->get();

        return $employees;
    }

    /**
     * Retrieves all employees by position and region
     *  
     * @see getEmployeesPositionByRegionOnly()
     * @param[in] position_id
     * @param[in] region_id
     * @return Employees
     */
    private function getEmployeesPositionByRegionOnly($position_id, $region_id)
    {
        $employees = DB::table('employees')
            ->select('employees.name', 'employees.surname') 
            ->where('position_id', $position_id)
            ->where('region_id', $region_id)
            ->get();

        return $employees;
    }

    /**
     * Retrieves all employees by position, region and facility
     *  
     * @see getEmployeesBy()
     * @param[in] position_id
     * @param[in] region_id
     * @param[in] facility_id
     * @return Employees
     */
    private function getEmployeesBy($position_id, $region_id, $facility_id)
    {
        $employees = DB::table('employees')
            ->select('employees.name', 'employees.surname') 
            ->where('position_id', $position_id)
            ->where('region_id', $region_id)
            ->where('employee_organizations.facility_taxi_rank_id', $facility_id)
            ->join('employee_organizations', 'employees.id', '=', 'employee_organizations.employee_id')
            ->join('facility', 'employee_organizations.facility_taxi_rank_id', '=', 'facility.id')
            ->get();

        return $employees;
    }

    /**
     * Retrieves all facilities or taxi ranks
     *  
     * @see getTaxiRanksBy()
     * @param[in] region_id
     * @return count of taxi ranks.
     */
    private function getTaxiRanksBy($region_id)
    {
        if( $region_id == 1001 )
        {
            $taxi_ranks = Facility::where('id', 12)->get();
            $taxi_ranks_count = count($taxi_ranks);
        }
        else if( $region_id == 1002 )
        {
            $taxi_ranks = Facility::where('id', 23)->get();
            $taxi_ranks_count = count($taxi_ranks);

            /*$taxi_ranks_count = count(EmployeeOrganization::where('facility_taxi_rank_id', 
                                23)->get()); */
        }
        else if( $region_id == 1003 )
        {
            $taxi_ranks = Facility::where('id', 62)->get();
            $taxi_ranks_count = count($taxi_ranks);
            /*$taxi_ranks_count = count(EmployeeOrganization::where('facility_taxi_rank_id', 
                                62)->get()); */
        }
        else if( $region_id == 1004 )
        {
            $taxi_ranks = Facility::where('id', 68)->get();
            $taxi_ranks_count = count($taxi_ranks);
            /*$taxi_ranks_count = count(EmployeeOrganization::where('facility_taxi_rank_id', 
                                68)->get());*/
        }
        else if( $region_id == 1005 )
        {
            $taxi_ranks = Facility::where('id', 78)->get();
            $taxi_ranks_count = count($taxi_ranks);

            /*$taxi_ranks_count = count(EmployeeOrganization::where('facility_taxi_rank_id', 
                                78)->get());*/
        }
        else if( $region_id == 1099 )
        {
            $taxi_ranks = Facility::where('id', 2111)->get();
            $taxi_ranks_count = count($taxi_ranks);
            /*$taxi_ranks_count = count(EmployeeOrganization::where('facility_taxi_rank_id', 
                                2111)->get());*/
        }
        else
        {
            $taxi_ranks = Facility::all();
            $taxi_ranks_count = count($taxi_ranks);
        }

        return $taxi_ranks_count;
    }

    /**
     * Filters by regions
     *
     * @see filterByRegionID()
     * @param[in] region_id
     * @param[in] facility_id
     * @return \Illuminate\Http\Response
    */
    public function filterByRegionID($region_id, $facility_id) 
    {
        /* Retrieve taxi ranks */
        $taxi_ranks = Employee::with(['organization.facility'])
                        ->distinct()
                        ->where('region_id', $region_id)
                        ->get();

        /* Retrieve all employees per region */
        $ekurhuleni = Employee::where('region_id', 1001)->get();
        $jhb = Employee::where('region_id', 1002)->get(); 
        $sedibeng = Employee::where('region_id', 1003)->get();
        $tshwane = Employee::where('region_id', 1004)->get();
        $westrand = Employee::where('region_id', 1005)->get();
        $unknown = Employee::where('region_id', 1099)->get();

        /* Count all employees per regions */
        $ekurhuleni_count = count($ekurhuleni);
        $jhb_count = count($jhb);
        $sedibeng_count = count($sedibeng);
        $tshwane_count = count($tshwane);
        $westrand_count = count($westrand);
        $unknown_count = count($unknown);

        /* region_id and municipality_id are not the same!! */
        /* municipality IDs for regions */
        $m_ekurhuleni = Facility::where('municipality_id', 12)->get();
        $m_jhb = Facility::where('municipality_id', 23)->get();
        $m_sedibeng = Facility::where('municipality_id', 62)->get();
        $m_tshwane = Facility::where('municipality_id', 68)->get();
        $m_westrand = Facility::where('municipality_id', 78)->get();
        $m_unknown = Facility::where('municipality_id', 2111)->get();

        $employees = Employee::all();
        $verified_employees_count = 0;
        $taxi_ranks_count = 0;
        $manager_count = 0;
        $cordinator_count = 0;
        $marshall_count = 0;
        $squad_count = 0;
        $other_count = 0;

        $association_count = 0; 
        $route_count = 0; 

        if( $region_id != '0' & $facility_id != '0')
        {
            /* Retrieve list of employees by region */
            $employees = DB::table('employees')
            ->select('employees.name', 'employees.surname', 'employee_positions.position')
            ->where('region_id', $region_id)
            ->where('employee_organizations.facility_taxi_rank_id', $facility_id)
            ->join('employee_organizations', 'employees.id', '=', 'employee_organizations.employee_id')
            ->join('employee_positions', 'employee_positions.id', '=', 'employees.position_id')
            ->get();

            $verified_employees_count = count(DB::table('employees')
            ->select('employees.name', 'employees.surname', 'employee_positions.position')
            ->where('region_id', $region_id)
            ->where('employee_organizations.facility_taxi_rank_id', $facility_id)
            ->where('association_approved', true)
            ->where('letter_issued', true)
            ->where('letter_signed', true)
            ->join('employee_verifications', 'employees.id', '=', 'employee_verifications.employee_id')
            ->join('employee_organizations', 'employees.id', '=', 'employee_organizations.employee_id')
            ->join('employee_positions', 'employee_positions.id', '=', 'employees.position_id')
            ->get());

            /* filter positions by region and taxi rank */
            $manager = $this->getEmployeesBy(1, $region_id, $facility_id);
            $cordinator = $this->getEmployeesBy(2, $region_id, $facility_id);
            $marshall = $this->getEmployeesBy(3, $region_id, $facility_id);
            $squad = $this->getEmployeesBy(4, $region_id, $facility_id);
            $other = $this->getEmployeesBy(5, $region_id, $facility_id);

            $manager_count = count( $manager );
            $cordinator_count = count( $cordinator );
            $marshall_count = count( $marshall );
            $squad_count = count( $squad );
            $other_count = count( $other );
        }
        else if( $region_id == '0' & $facility_id != '0')
        {
            /* Retrieve list of employees by region */
            $employees = DB::table('employees')
            ->select('employees.name', 'employees.surname', 'employee_positions.position')
            ->where('employee_organizations.facility_taxi_rank_id', $facility_id)
            ->join('employee_organizations', 'employees.id', '=', 'employee_organizations.employee_id')
            ->join('employee_positions', 'employee_positions.id', '=', 'employees.position_id')
            ->get();

            $verified_employees_count = count($employees = DB::table('employees')
            ->select('employees.name', 'employees.surname', 'employee_positions.position')
            ->where('employee_organizations.facility_taxi_rank_id', $facility_id)
            ->where('association_approved', true)
            ->where('letter_issued', true)
            ->where('letter_signed', true)
            ->join('employee_verifications', 'employees.id', '=', 'employee_verifications.employee_id')
            ->join('employee_organizations', 'employees.id', '=', 'employee_organizations.employee_id')
            ->join('employee_positions', 'employee_positions.id', '=', 'employees.position_id')
            ->get());

            $manager = $this->getEmployeesPositionByFacilityOnly(1, $facility_id);
            $cordinator = $this->getEmployeesPositionByFacilityOnly(2, $facility_id);
            $marshall = $this->getEmployeesPositionByFacilityOnly(3, $facility_id);
            $squad = $this->getEmployeesPositionByFacilityOnly(4, $facility_id);
            $other = $this->getEmployeesPositionByFacilityOnly(5, $facility_id);

            $manager_count = count( $manager );
            $cordinator_count = count( $cordinator );
            $marshall_count = count( $marshall );
            $squad_count = count( $squad );
            $other_count = count( $other );

            $association_count = count(Association::all());
            $route_count = count(Route::all());
        }
        else if( $region_id != '0' & $facility_id == '0')
        {
            /* Retrieve list of employees by region */  
            $employees = DB::table('employees')
            ->select('employees.name', 'employees.surname', 'employee_positions.position')
            ->where('region_id', $region_id)
            ->join('employee_positions', 'employee_positions.id', '=', 'employees.position_id')
            ->get();

            $verified_employees_count = count(DB::table('employees')
            ->select('employees.name', 'employees.surname', 'employee_positions.position')
            ->where('region_id', $region_id)
            ->where('association_approved', true)
            ->where('letter_issued', true)
            ->where('letter_signed', true)
            ->join('employee_verifications', 'employees.id', '=', 'employee_verifications.employee_id')
            ->join('employee_positions', 'employee_positions.id', '=', 'employees.position_id')
            ->get());

            $manager = $this->getEmployeesPositionByRegionOnly(1, $region_id);
            $cordinator = $this->getEmployeesPositionByRegionOnly(2, $region_id);
            $marshall = $this->getEmployeesPositionByRegionOnly(3, $region_id);
            $squad = $this->getEmployeesPositionByRegionOnly(4, $region_id);
            $other = $this->getEmployeesPositionByRegionOnly(5, $region_id);

            $manager_count = count( $manager );
            $cordinator_count = count( $cordinator );
            $marshall_count = count( $marshall );
            $squad_count = count( $squad );
            $other_count = count( $other );

            $association_count = count(Association::where('region_id', $region_id)->get());
            $route_count = count(Route::where('region_id', $region_id)->get());

        }
        else
        {
            $employees = DB::table('employees')
            ->select('employees.name', 'employees.surname', 'employee_positions.position')
            ->join('employee_positions', 'employee_positions.id', '=', 'employees.position_id')
            ->get();

            $verified_employees_count = count(EmployeeVerification::where('association_approved', true)
            ->where('letter_issued', true)
            ->where('letter_signed', true)
            ->get());

            $manager = Employee::where('position_id', 1)->get();
            $cordinator =Employee::where('position_id', 2)->get();
            $marshall = Employee::where('position_id', 3)->get();
            $squad = Employee::where('position_id', 4)->get();
            $other = Employee::where('position_id', 5)->get();

            $manager_count = count( $manager );
            $cordinator_count = count( $cordinator );
            $marshall_count = count( $marshall );
            $squad_count = count( $squad );
            $other_count = count( $other );

            $association_count = count(Association::all());
            $route_count = count(Route::all());
        }

        /* Count all taxi ranks */
        $taxi_ranks_count = $this->getTaxiRanksBy($region_id, $facility_id); 
        $employee_count = count($employees);

        return response()->json(
            [
                'taxi_ranks' => $taxi_ranks,
                'manager' => $manager_count, 
                'marshall' => $marshall_count,
                'coordinator' => $cordinator_count,
                'squad' => $squad_count,
                'other' => $other_count,
                'association_count' => $association_count,
                'route_count' => $route_count,
                'employee_count' => $employee_count,
                'taxi_ranks_count' => $taxi_ranks_count,
                'employees' => $employees,
                'verified_employees_count' => $verified_employees_count
            ]);

        //return response()->json( $taxi_ranks->first()->organization->facility->id);

    }

    /**
     * Retrieves list of facilities
     *
     * @see filterByRegionID()
     * @return \Illuminate\Http\Response
     */
    public function getAllFacilities()
    {
        $all_facilities =  Facility::all();
        $facility_data = [];
        $count = 0;

        foreach($all_facilities as $facility)
        {
            $c_managers = EmployeeOrganization::with(['employees'])
                                ->where('facility_taxi_rank_id', $facility->id)
                                ->whereHas('employee', function($q) {
                                    $q->where('position_id', 1);
                                })
                                ->count();

            $c_coordinators = EmployeeOrganization::with(['employees'])
                                ->where('facility_taxi_rank_id', $facility->id)
                                ->whereHas('employee', function($q) {
                                    $q->where('position_id', 2);
                                })
                                ->count();

            $c_marshalls = EmployeeOrganization::with(['employees'])
                                ->where('facility_taxi_rank_id', $facility->id)
                                ->whereHas('employee', function($q) {
                                    $q->where('position_id', 3);
                                })
                                ->count();

            $c_squad = EmployeeOrganization::with(['employees'])
                                ->where('facility_taxi_rank_id', $facility->id)
                                ->whereHas('employee', function($q) {
                                    $q->where('position_id', 4);
                                })
                                ->count();
            
            $c_other = EmployeeOrganization::with(['employees'])
                                ->where('facility_taxi_rank_id', $facility->id)
                                ->whereHas('employee', function($q) {
                                    $q->where('position_id', 5);
                                })
                                ->count();

            $facility_data[$count]['facility'] = $facility;
            $facility_data[$count]['c_managers'] = $c_managers;
            $facility_data[$count]['c_coordinators'] = $c_coordinators;
            $facility_data[$count]['c_marshalls'] = $c_marshalls;
            $facility_data[$count]['c_squad'] = $c_squad;
            $facility_data[$count]['c_other'] = $c_other;

            $count++;
        }
        
        return response()->json(['data' =>$facility_data]);
    }

    /**
     * Updates Employee Verification Status.
     *
     * @param  int  $employee_id, $is_association_approved, 
     *       is_letter_issued, is_letter_signed
     * @return \Illuminate\Http\Response
     */
    public function verifyEmployee($employee_id, $is_association_approved,
                            $is_letter_issued, $is_letter_signed, $is_banking_details_confirmed )
    {
        $employee = EmployeeVerification::where('employee_id', $employee_id);

        $employee_update = array(
            'association_approved' => $is_association_approved,
            'letter_issued' => $is_letter_issued,
            'letter_signed' => $is_letter_signed,
            'banking_details_confirmed' => $is_banking_details_confirmed,
        );

        if( $employee->update($employee_update) )
        { 
            return response('Employee verification status updated!', 200)
            ->header('Content-Type', 'text/plain');
        }
        else
        {
            return response('Employee verification status update failed!', 400)
            ->header('Content-Type', 'text/plain');
        }
    }

    /**
     * Retrieves list of Minibus associations by Region.
     *
     * @param  int  $region_id
     * @return \Illuminate\Http\Response
     */
    public function getAssociationsByRegionID($region_id=1001) 
    {
        $associations_per_region = Association::where('region_id',$region_id)->get();
        return response()->json(['data' =>$associations_per_region]);

    }

    /**
     * Retrieves list of routes by Minibus Associations.
     *
     * @param  int  $association_id
     * @return \Illuminate\Http\Response
     */
    public function getRoutesByAssociationID($association_id) {

        $routes_per_association = Route::where('association_id',$association_id)->get();

        return response()->json(['data' =>$routes_per_association]);

    }

    /**
     * Retrieves total count of employee managers, 
     * marshall, coordinator, squad & others
     *
     * @return \Illuminate\Http\Response
     */
    public function getEmployeeRankDistribution()
    {
        $manager_count = count(Employee::where('position_id', 1)->get());
        $cordinator_count = count(Employee::where('position_id', 2)->get());
        $marshall_count = count(Employee::where('position_id', 3)->get());
        $squad_count = count(Employee::where('position_id', 4)->get());
        $other_count = count(Employee::where('position_id', 5)->get());

        return response()->json(
            [
                'manager' => $manager_count, 
                'marshall' => $marshall_count,
                'coordinator' => $cordinator_count,
                'squad' => $squad_count,
                'other' => $other_count
            ]);

    }

    /**
     * Retrieves total count of employees per region i.e ekurhuleni,
     * jhb, sedibeng, tshwane, westrand & unknown regions
     *
     * @return \Illuminate\Http\Response
     */
    public function getEmployeeRegionDistribution()
    {
        $ekurhuleni_count = count(Employee::where('region_id', 1001)->get());
        $jhb_count = count(Employee::where('region_id', 1002)->get());
        $sedibeng_count = count(Employee::where('region_id', 1003)->get());
        $tshwane_count = count(Employee::where('region_id', 1004)->get());
        $westrand_count = count(Employee::where('region_id', 1005)->get());
        $unknown_count = count(Employee::where('region_id', 1099)->get());

        return response()->json(
            [
                'ekurhuleni_count' => $ekurhuleni_count,
                'jhb_count' => $jhb_count, 
                'sedibeng_count' => $sedibeng_count,
                'tshwane_count' => $tshwane_count, 
                'westrand_count' => $westrand_count,
                'unknown_count' => $unknown_count, 
            ]);

    }

    /**
     * Retrieves count of each employee male and female
     *
     * @return \Illuminate\Http\Response
     */
    public function getEmployeeGenderDistribution()
    {
        $male_count = count(Employee::where('gender_id', 1)->get());
        $female_count = count(Employee::where('gender_id', 2)->get());

        return response()->json(
            [
                'male' => $male_count, 
                'female' => $female_count
            ]);

    }

    /**
     * Check existence of identity numbers.
     *
     * @param  int  $idnumber
     * @return \Illuminate\Http\Response
     */
    public function idExists($idnumber) {

        $count = count(Member::where('id_number', $idnumber)->get());

        return response()->json(['data' =>$count]);

    }

    /**
     * Check existence of Driver Licence numbers.
     *
     * @param  int  $licencenumber
     * @return \Illuminate\Http\Response
     */
    public function driversLicenseNumberExists($licencenumber) {

        $count = count(MemberDriver::where('license_number', $licencenumber)->get());

        return response()->json(['data' =>$count]);

    }

    /**
     * Check existence of Operating Licence numbers.
     *
     * @param  int  $licencenumber
     * @return \Illuminate\Http\Response
     */
    public function operatingLicenseNumberExists($licencenumber) {

        $count = count(MemberOperator::where('license_number', $licencenumber)->get());

        return response()->json(['data' =>$count]);

    }

    /**
     * Check existence of Membership numbers.
     *
     * @param  int  $membershipnumber
     * @return \Illuminate\Http\Response
     */
    public function membershipNumberExists($membershipnumber) {

        $count_dr = count(MemberDriver::where('membership_number', $membershipnumber)->get());
        $count_op = count(MemberOperator::where('membership_number', $membershipnumber)->get());

        $total = $count_dr + $count_op;

        return response()->json(['data' =>$total]);

    }

    /**
     * Check existence of Car Registration numbers.
     *
     * @param  int  $carregnumber
     * @return \Illuminate\Http\Response
     */
    public function getCarRegNumberCount($carregnumber) {

        $vehicle = Vehicle::where('registration_number', 
                            $carregnumber)->get();
        $member_vehicles = new MemberVehicle();
        $route_vehicle = new RouteVehicle();
        $region = new Region();
        $association = new Association();
        $member_region_association = new MemberRegionAssociation();

        if( count($vehicle) > 0 )
        {
            $member_vehicles = MemberVehicle::where('vehicle_id', $vehicle[0]['id'])
                                            ->with(['vehicles.vehicleclass.type'])
                                            ->get();

            $route_vehicle = RouteVehicle::where('vehicle_id', $vehicle[0]['id'])
                                            ->get();

            $member_region_association = MemberRegionAssociation::where('member_id', 
                                            $member_vehicles[0]['member_id'] )
                                            ->get();

            if( count($member_region_association) > 0 )
            {
                $region = Region::where('region_id', 
                                        $member_region_association[0]['region_id'])
                                        ->get();
                $association = Association::where('association_id', 
                                        $member_region_association[0]['association_id'])
                                        ->get();
            }
    
            $count = count($vehicle);

            return response()->json(['count' => $count, 
                                        'datamv' => $member_vehicles,
                                        'datarv' => $route_vehicle,
                                        'datar' => $region,
                                        'dataa' => $association
                                    ]);
        }
    }
}
