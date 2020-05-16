<?php

namespace App\Http\Controllers;

use App\Route;
use App\Association;

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
}
