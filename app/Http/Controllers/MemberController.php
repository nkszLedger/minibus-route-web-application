<?php

namespace App\Http\Controllers;

use App\Association;
use App\Member;
use App\MembershipType;
use App\MemberVehicle;
use App\Portrait;
use App\Region;
use App\Route;
use App\RouteVehicle;
use App\Vehicle;
use App\City;
use App\Fingerprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{

    public function dashboard()
    {
        return view('index-3');
    }


    public function getAssociations($region_id=1001) {

        $associations_per_region = Association::where('region_id',$region_id)->get();

//        echo json_encode($associations_per_region);
//        exit();
        return response()->json(['data' =>$associations_per_region]);

    }

    public function getRoutesPerAssociation($association_id) {

        $routes_per_association = Route::where('association_id',$association_id)->get();

        return response()->json(['data' =>$routes_per_association]);

    }

    public function showregpage()
    {
        $all_types = MembershipType::all();
        $all_cities = City::all();
        $all_regions = Region::all();
        $all_associations = Association::all();

        return view('member_registration', compact(['all_types','all_regions',
                                                    'all_associations', 
                                                    'all_cities'
                                                  ]));

    }


    public function create_member(Request $request)
    {
        $member = new Member();

        $vehicle = new Vehicle();

        $member_form_id = $request->get('member-id');

        if($member_form_id === null) {
            $member->name = $request->get('firstName');
            $member->surname = $request->get('lastName');
            $member->id_number = $request->get('idnumber');
            $member->license_number = $request->get('licensenumber');
            $member->email = $request->get('emailAddress');
            $member->phone_number = $request->get('phonenumber');
            $member->address_line = $request->get('addressline1');
            $member->membership_type_id = $request->get('membership-type'); //TODO check if associate method cannot be used
            $member->association_id = $request->get('association');
            $member->postal_code = $request->get('postal-code');
            $member->region_id = $request->get('region');
            $member->city_id = $request->get('city');

            if($member->save()) {
                $vehicle->registration_number = $request->get('regnumber');
                $vehicle->make = $request->get('vehiclemake');
                $vehicle->model = $request->get('vehiclemodel');
                $vehicle->year = $request->get('vehicleyear');
                $vehicle->seats_number = $request->get('vehicleseats');

                if($vehicle->save()) {

                    $member_vehicle = new MemberVehicle();

                    $member_vehicle->member_id  = $member->id;
                    $member_vehicle->vehicle_id = $vehicle->id;

                    if($member_vehicle->save()) {

                        if(!empty($request->get('route'))) {

                            foreach ((array)$request->get('route') as $checkbox_value) {

                                $route_vehicle = new RouteVehicle();

                                $route_vehicle->route_id = $checkbox_value;
                                $route_vehicle->vehicle_id = $vehicle->id;

                                $route_vehicle->save();
                            }
                        }

                    }

                }
                else {

                    return back()->withErrors('Whoops')->withInput();
                }

            }
            else {

                return back()->withErrors('Whoops')->withInput();
            }

        }
        //update the model
        else 
        {
            $check_member_exist = Member::with(['vehicles'])->findOrFail($member_form_id);

            if($check_member_exist !== null ) {

                $member->where('id',$member_form_id)->update([
                    'name' =>$request->get('firstName'),
                    'surname' =>  $request->get('lastName'),
                    'id_number' =>$request->get('idnumber'),
                    'license_number' =>$request->get('licensenumber'),
                    'email' => $request->get('emailAddress'),
                    'phone_number' => $request->get('phonenumber'),
                    'address_line' => $request->get('addressline1'),
                    'postal_code' => $request->get('postal-code'),
                    'city_id' => $request->get('city'),
                    'membership_type_id' =>$request->get('membership-type'),//TODO check if associate method cannot be used
                    'association_id' => $request->get('association'),
                    'region_id' => $request->get('region')

                ]);
            }



            $vehicle_exist = Vehicle::where('id',$check_member_exist->vehicles[0]->id)->exists();

            if($vehicle_exist) {

                $is_updated = $vehicle ->where('id',$member_form_id)->update([
                    'registration_number' => $request->get('regnumber'),
                    'make' =>  $request->get('vehiclemake'),
                    'model' =>$request->get('vehiclemodel'),
                    'year' =>$request->get('vehicleyear'),
                    'seats_number' => $request->get('vehicleseats')

                ]);
                $member_vehicle = new MemberVehicle();

                $member_vehicle->where('vehicle_id',$check_member_exist->vehicles[0]->id)->update([
                    'member_id' => $member_form_id,
                    'vehicle_id' => $check_member_exist->vehicles[0]->id
                ]);

                $route_vehicle = new RouteVehicle();

                if(!empty($request->get('route'))) {
                    foreach ((array)$request->get('route') as $checkbox_value) {

                        $route_vehicle->where('vehicle_id', $check_member_exist->vehicles[0]->id)->update([
                            'vehicle_id' => $check_member_exist->vehicles[0]->id,
                            'route_id' => $checkbox_value
                        ]);

                    }

                }

                if ($is_updated === false) {
                    dd('could not update vehicle table, something went wrong');
                }
            }
            else 
            {
                $vehicle->registration_number = $request->get('regnumber');
                $vehicle->make = $request->get('vehiclemake');
                $vehicle->model = $request->get('vehiclemodel');
                $vehicle->year = $request->get('vehicleyear');
                $vehicle->seats_number = $request->get('vehicleseats');

                if($vehicle->save()) 
                {
                    $member_vehicle = new MemberVehicle();

                    $member_vehicle->member_id  = $member->id;
                    $member_vehicle->vehicle_id = $vehicle->id;
                    $member_vehicle->save();
                }
                else
                {
                    return redirect()->withInput();
                }

                if(!empty($request->get('route'))) {
                    foreach ((array)$request->get('route') as $checkbox_value) 
                    {

                        $route_vehicle = new RouteVehicle();

                        $route_vehicle->route_id = $checkbox_value; //$request->get('route');
                        $route_vehicle->vehicle_id = $vehicle->id;

                        $route_vehicle->save();
                    }
                }
            }

        }

        return  redirect('list_members');
    }

    public function list_members()
    {
        $all_members = Member::with(['membership_type','member_association',
                                        'portrait'])->orderBy('id','desc')->get();

        return view('list_members_table_data', 
                    compact(['all_members']));

    }

    public function show_member($id)
    {
        $member_record = Member::with(['membership_type','member_association',
                                        'vehicles','portrait','fingerprint',
                                        'city', 'region'])->findOrFail($id);

        $member_vehicle_routes = Vehicle::with('routes')->where('id',$member_record['vehicles'][0]['id'])->get();

        $member_vehicle_record = MemberVehicle::where('member_id', $id)->get();
        $member_vehicle_id = $member_vehicle_record[0]['id'];

        $route_vehicle = RouteVehicle::where('vehicle_id', $member_vehicle_id )->get();

        $all_routes = Route::whereIn('id', function ($query) use($member_vehicle_id){
                            $query->select('route_id')
                                ->from('route_vehicle')
                                ->whereColumn('route_id', 'routes.id')
                                ->where('vehicle_id','=' , $member_vehicle_id);
                            })->get();

        $all_membership_types = MembershipType::all();
        $all_associations = Association::all();
        $all_regions = Region::all();
        $all_cities = City::all();

        return view('member_registration',  compact(['member_record', 'member_vehicle_record',
                                                        'member_vehicle_routes',
                                                        'route_vehicle','all_membership_types',
                                                        'all_associations','all_routes',
                                                        'all_regions','all_cities'
                                                  ]));

        // return response()
        //         ->view('show_member_details', ['member_record'=>$member_record,
        //                                         'member_vehicle_record'=>$member_vehicle_record, 
        //                                         'all_associations'=>$all_associations,
        //                                         'all_routes'=>$all_routes,'route_vehicle'=>$route_vehicle,
        //                                         'all_member_types'=>$all_member_types,
        //                                         'member_vehicle_routes'=> $member_vehicle_routes, 
        //                                         'all_regions'=>$all_regions, 'all_cities'=>$all_cities], 200)
        //         ->header('Content-Type', 'json');
    }

    public function showmodal($id)
    {

        $member_record = Member::with(['membership_type','member_association',
                                        'vehicles','portrait','fingerprint',
                                        'city', 'region'])->findOrFail($id);
        
        $member_vehicle_routes = Vehicle::with('routes')->where('id',$member_record['vehicles'][0]['id'])->get();
        
        $portrait = Portrait::where('id',$id)->get();
        $fingerprint = Fingerprint::where('id',$id)->get();

        $member_vehicle_record = MemberVehicle::where('member_id', $id)->get();
        $member_vehicle_id = $member_vehicle_record[0]['id'];

        $route_vehicle = RouteVehicle::where('vehicle_id', $member_vehicle_id )->get();

        $all_routes = Route::whereIn('id', function ($query) use($member_vehicle_id){
                            $query->select('route_id')
                                ->from('route_vehicle')
                                ->whereColumn('route_id', 'routes.id')
                                ->where('vehicle_id','=' , $member_vehicle_id);
                            })->get();

        $all_membership_types = MembershipType::all();
        $all_associations = Association::all();
        $all_regions = Region::all();
        $all_cities = City::all();
        
        return response()
            ->view('modal_view', ['member_record'=>$member_record, 'portrait'=>$portrait, 
                                    'fingerprint'=>$fingerprint, 'all_associations'=>$all_associations,
                                    'all_routes'=>$all_routes,'member_vehicle_routes'=> $member_vehicle_routes, 
                                    'all_regions'=>$all_regions, 'all_membership_types'=>$all_membership_types, 
                                    'all_cities'=>$all_cities], 200)
            ->header('Content-Type', 'json');


    }




}
