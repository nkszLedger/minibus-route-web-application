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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

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
        $all_regions = Region::all();
        $all_associations = Association::all();
        $all_routes = Route::limit(10)->get();



//        dd($all_routes);
        return view('member_registration', compact(['all_types','all_regions','all_associations','all_routes']));

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
            $member->address_line_one = $request->get('addressline1');
            $member->address_line_two = $request->get('addressline2');
            $member->membership_type_id = $request->get('membership-type'); //TODO check if associate method cannot be used
            $member->association_id = $request->get('association');
            $member->region_id = $request->get('region');


            if($member->save()) {
                $vehicle->registration_number = $request->get('regnumber');
                $vehicle->make = $request->get('vehiclemake');
                $vehicle->model = $request->get('vehiclemodel');
                $vehicle->year = $request->get('vehiclemake');
                $vehicle->seats_number = $request->get('vehicleseats');

                if($vehicle->save()) {

                    $member_vehicle = new MemberVehicle();

                    $member_vehicle->member_id  = $member->id;
                    $member_vehicle->vehicle_id = $vehicle->id;

                    if($member_vehicle->save()) {

                        $route_vehicle = new RouteVehicle();

                        if(!empty($request->get('route'))) {
                            foreach ((array)$request->get('route') as $checkbox_value) {
                                $route_vehicle->route_id = $checkbox_value; //$request->get('route');
                                $route_vehicle->vehicle_id = $vehicle->id;
                            }

                            $route_vehicle->save();
                        }
//                        $route_vehicle->route_id = $request->get('route');
                        //$route_vehicle->vehicle_id = $vehicle->id;//$request->get('route');
                        //$route_vehicle->save();

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
        else {

            $check_member_exist = Member::with(['vehicles'])->findOrFail($member_form_id);

            if($check_member_exist !== null ) {

                $member->where('id',$member_form_id)->update([
                    'name' =>$request->get('firstName'),
                    'surname' =>  $request->get('lastName'),
                    'id_number' =>$request->get('idnumber'),
                    'license_number' =>$request->get('licensenumber'),
                    'email' => $request->get('emailAddress'),
                    'phone_number' => $request->get('phonenumber'),
                    'address_line_one' =>$request->get('addressline1'),
                    'address_line_two' =>$request->get('addressline2'),
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
                    'year' =>$request->get('vehiclemake'),
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

//                        $route_vehicle->route_id = $checkbox_value; //$request->get('route');
//                        $route_vehicle->vehicle_id = $vehicle->id;
                    }

                }



                if ($is_updated === false) {
                    dd('could not update vehicle table, something went wrong');
                }
            }
            else {
                $vehicle->registration_number = $request->get('regnumber');
                $vehicle->make = $request->get('vehiclemake');
                $vehicle->model = $request->get('vehiclemodel');
                $vehicle->year = $request->get('vehiclemake');
                $vehicle->seats_number = $request->get('vehicleseats');

                if($vehicle->save()) {
                    $member_vehicle = new MemberVehicle();

                    $member_vehicle->member_id  = $member->id;
                    $member_vehicle->vehicle_id = $vehicle->id;
                    $member_vehicle->save();
                }
                else{
                    return redirect()->withInput();
                }


                $route_vehicle = new RouteVehicle();

                if(!empty($request->get('route'))) {
                    foreach ((array)$request->get('route') as $checkbox_value) {
                        $route_vehicle->route_id = $checkbox_value; //$request->get('route');
                        $route_vehicle->vehicle_id = $vehicle->id;
                    }

                    $route_vehicle->save();
                }

//                $route_vehicle->route_id = $request->get('route');
//                $route_vehicle->vehicle_id = $vehicle->id;
//                $route_vehicle->save();
            }

        }

        return  redirect('list_members');
    }

    public function list_members()
    {
        $all_members = Member::with(['membership_type','member_association','portrait'])->orderBy('id','desc')->get();

        return view('list_members_table_data',compact(['all_members']));

    }

    public function show_member($id)
    {


        $member_record = Member::with(['membership_type','member_association','vehicles','region'])->findOrFail($id);

//        $member_vehicle_routes = Vehicle::with('routes')->where('id',$member_record['vehicles'][0]['id'])->get();
        $member_vehicle_routes = Vehicle::with('routes')->where('id',$member_record['vehicles'][0]['id'])->get();


        $all_routes = Route::limit(10)->get(); //$all_routes = Route::all();


        $portrait = Portrait::where('id',$id)->get();

        $all_member_types = MembershipType::all();

        $all_associations = Association::all();
//        $all_associations = Association::where('region_id',$member_record['region']['region_id'])->get();


        $all_regions = Region::all();


//        dd($member_vehicle_routes[0]);

        return view('show_member_details', compact(['member_record', 'all_routes','all_member_types','all_associations','portrait', 'member_vehicle_routes','all_regions']));

    }

    public function showmodal($id)
    {

        $member_record = Member::with(['membership_type','member_association','vehicles','portrait','fingerprint','region'])->findOrFail($id);

        $all_routes = Route::limit(10)->get(); //$all_routes = Route::all();

        $portrait = Portrait::where('id',$id)->get();

        $all_member_types = MembershipType::all();
        $all_associations = Association::all();

        $member_vehicle_routes = Vehicle::with('routes')->where('id',$member_record['vehicles'][0]['id'])->get();
        $all_regions = Region::all();

        //dd($member_record);
        
        return response()
            ->view('modal_view', ['member_record'=>$member_record, 'portrait'=>$portrait, 'all_associations'=>$all_associations,
                    'all_routes'=>$all_routes,'member_vehicle_routes'=> $member_vehicle_routes, 'all_regions'=>$all_regions], 200)
            ->header('Content-Type', 'json');


    }




}
