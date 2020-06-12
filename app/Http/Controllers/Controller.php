<?php

namespace App\Http\Controllers;

use App\Vehicle;
use App\Route;
use App\Association;
use App\Member;
use App\MemberDriver;
use App\MemberOperator;

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
    public function getAssociationsByRegionID($region_id=1001) {

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
     * Check existence of identity numbers.
     *
     * @param  int  $idnumber
     * @return \Illuminate\Http\Response
     */
    public function idExists($idnumber) {

        $count = count(Member::where('id_number', $idnumber));

        return response()->json(['data' =>$count]);

    }

    /**
     * Check existence of Driver Licence numbers.
     *
     * @param  int  $licencenumber
     * @return \Illuminate\Http\Response
     */
    public function driversLicenseNumberExists($licencenumber) {

        $count = count(MemberDriver::where('license_number', $licencenumber));

        return response()->json(['data' =>$count]);

    }

    /**
     * Check existence of Membership numbers.
     *
     * @param  int  $membershipnumber
     * @return \Illuminate\Http\Response
     */
    public function membershipNumberExists($membershipnumber) {

        $count_dr = count(MemberDriver::where('membership_number', $membershipnumber));
        $count_op = count(MemberOperator::where('membership_number', $membershipnumber));

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

        $count = count(Vehicle::where('registration_number', $carregnumber));

        return response()->json(['data' =>$count]);

    }
}
