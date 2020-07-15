<?php

namespace App\Http\Controllers;

use App\Vehicle;
use App\Route;
use App\Association;
use App\Employee;
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
