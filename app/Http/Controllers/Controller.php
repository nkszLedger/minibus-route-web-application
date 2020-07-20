<?php

namespace App\Http\Controllers;

use App\Vehicle;
use App\Route;
use App\Association;
use App\Employee;
use App\EmployeePosition;
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

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

     /**
     * Retrieves list of counts by Region.
     *
     * @param  int  $region_id
     * @return \Illuminate\Http\Response
     */
    public function filterByRegionID($region_id) 
    {
        $ekurhuleni_count = count(Employee::where('region_id', 1001)->get());
        $jhb_count = count(Employee::where('region_id', 1002)->get());
        $sedibeng_count = count(Employee::where('region_id', 1003)->get());
        $tshwane_count = count(Employee::where('region_id', 1004)->get());
        $westrand_count = count(Employee::where('region_id', 1005)->get());
        $unknown_count = count(Employee::where('region_id', 1099)->get());

        if( $region_id != '0')
        {
            /* filter Positions */
            $manager_count = count(Employee::where('position_id', 1)->where('region_id', $region_id)->get());
            $cordinator_count = count(Employee::where('position_id', 2)->where('region_id', $region_id)->get());
            $marshall_count = count(Employee::where('position_id', 3)->where('region_id', $region_id)->get());
            $squad_count = count(Employee::where('position_id', 4)->where('region_id', $region_id)->get());
            $other_count = count(Employee::where('position_id', 5)->where('region_id', $region_id)->get());

            /*$driver_count = count(MemberDriver::all());
            $operator_count = count(MemberOperator::all());*/

            $association_count = count(Association::where('region_id', $region_id)->get());
            $route_count = count(Route::where('region_id', $region_id)->get());
            $employee_count = count(Employee::where('region_id', $region_id)->get());
            $employee_verified_count = 0;

            $registered_employees_count = count(Employee::where('region_id', $region_id)->get());

            return response()->json(
                [
                    'manager' => $manager_count, 
                    'marshall' => $marshall_count,
                    'coordinator' => $cordinator_count,
                    'squad' => $squad_count,
                    'other' => $other_count,
                    'registered_employees' => $registered_employees_count,
                    'association_count' => $association_count,
                    'route_count' => $route_count,
                    'employee_count' => $employee_count,
                ]);
        }
        else
        {
            /* filter Positions */
            $manager_count = count(Employee::where('position_id', 1)->get());
            $cordinator_count = count(Employee::where('position_id', 2)->get());
            $marshall_count = count(Employee::where('position_id', 3)->get());
            $squad_count = count(Employee::where('position_id', 4)->get());
            $other_count = count(Employee::where('position_id', 5)->get());

            $all_positions = count(EmployeePosition::all());
            $driver_count = count(MemberDriver::all());
            $operator_count = count(MemberOperator::all());
            $association_count = count(Association::all());
            $route_count = count(Route::all());
            $employee_count = count(Employee::all());
            $employee_verified_count = 0;

            return response()->json(['driver_count' => $driver_count,
                                        'operator_count' => $operator_count,
                                        'association_count' => $association_count, 
                                        'route_count' => $route_count,
                                        'employee_count' => $employee_count,
                                        'employee_verified_count' => $employee_verified_count,
                                        'ekurhuleni_count' => $ekurhuleni_count,
                                        'jhb_count' => $jhb_count, 
                                        'sedibeng_count' => $sedibeng_count,
                                        'tshwane_count' => $tshwane_count, 
                                        'westrand_count' => $westrand_count,
                                        'unknown_count' => $unknown_count, 
                                        'all_positions' => $all_positions,
                                        'manager' => $manager_count,
                                        'coordinator' => $cordinator_count,
                                        'marshall' => $marshall_count, 
                                        'squad'=> $squad_count, 
                                        'other' => $other_count
                                    ]);
        }

    }

    /**
     * Retrieves list of facilities.
     *
     * @return \Illuminate\Http\Response
     */

    public function getAllFacilities()
    {
        $all_facilities =  Facility::all();
        return response()->json(['data' =>$all_facilities]);
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
