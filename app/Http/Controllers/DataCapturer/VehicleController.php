<?php

namespace App\Http\Controllers\DataCapturer;

use App\Member;
use App\Vehicle;
use App\Region;
use App\Association;
use App\DrivingLicenceCode;
use App\VehicleClass;
use App\MemberRegionAssociation;
use App\MemberVehicle;
use App\RouteVehicle;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VehicleController extends Controller
{
    /**
     * Create a resource
     *
     * @return \Illuminate\Http\Response
     */
    public function create($member_id)
    {
        $member_record = Member::with(['membership_type',
            'city', 'gender'])->findOrFail($member_id);

        $all_regions = Region::all();
        $all_driving_licence_codes = DrivingLicenceCode::all();
        $all_associations = Association::all();
        $all_vehicle_classes = VehicleClass::all();

        return view('datacapturer.vehicles.create', 
                    compact([ 'member_record',
                             'all_regions',
                             'all_associations',
                             'all_vehicle_classes',
                             'all_driving_licence_codes']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* Init all instances */
        $vehicle = new Vehicle();
        $route_vehicle = new RouteVehicle();
        $member_vehicle = new MemberVehicle();
        $member_region_association = new MemberRegionAssociation();

        $member_record = Member::where('member_id',$id)
                                    ->get();

        $validator = Validator::make(
            [
                'regnumber' => 'required|unique:vehicle',
                'vehicle_class' => 'required|min:1',
                'region' => 'required|min:1', 
                'association' => 'required|min:1',
                'route' => 'required|min:1'
            ]
        );

        if ($validator->fails()) 
        {
            return redirect('datacapturer.vehicles.create')
                        ->withErrors($validator)
                        ->withInput();
        }

        /* capture Vehicle Details */
        if( Vehicle::where('registration_number', 
            $request->get('regnumber') )->count() > 0)
        {
            $vehicle = Vehicle::where('registration_number', 
                                    $request->get('regnumber') );
            $vehicle->info = $request->get('notes');
            $vehicle->update();
        }
        else
        {
            $vehicle->vehicle_class_id = $request->get('vehicle_class');
            $vehicle->info = $request->get('notes');
            $vehicle->registration_number = $request->get('regnumber');
            $vehicle->save();
        }
    
        /* capture MEMBER VEHICLE details */
        $member_vehicle->member_id = $member_record->id;
        $member_vehicle->vehicle_id = $vehicle->id;
        $member_vehicle->save();

        if( $member_record->is_member_associated == true )
        {
            /* capture MEMBER REGION, ASSOCIATION details */
            $member_region_association->member_id = $member_record->id;
            $member_region_association->region_id = $request->get('region');
            $member_region_association->association_id = $request->get('association');
            $member_region_association->save();
            
            if( !empty($request->get('route')) ) 
            {
                foreach((array)$request->get('route') as $checkbox_value) 
                {
                    /* capture ROUTE VEHICLE details */
                    $route_vehicle->route_id = $checkbox_value;
                    $route_vehicle->vehicle_id = $vehicle->id;
                    $route_vehicle->save();
                }
            }
        }

        /* finally */
        $member_vehicles = MemberVehicle::where('member_id',
                                         $member_record->id)
                                        ->with(['vehicles.vehicleclass.type'])
                                        ->get();
        
        return view('datacapturer.members.create',      
                                    compact([   'member_record',
                                                'all_regions',
                                                'all_associations', 
                                                'all_driving_licence_codes',
                                                'all_vehicle_classes',
                                                'member_vehicles'
                                            ]));
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member_vehicles = MemberVehicle::where('vehicle_id', $id)
                                        ->with(['vehicles.vehicleclass.type'])
                                        ->get();

        return response()->json(['data' =>$member_vehicles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vehicle = Vehicle::where('id', $id);
        $route_vehicle = RouteVehicle::where('vehicle_id', $id);
        $member_vehicle = MemberVehicle::where('vehicle_id', $id);
        $member_record = Member::where('id', $member_vehicle->member_id);
        $member_region_association = MemberRegionAssociation::where('member_id',
                                                $member_vehicle->member_id);

        /* capture Vehicle Details */
        if( Vehicle::where('registration_number', 
            $request->get('regnumber') )->count() > 0)
        {
            $vehicle = Vehicle::where('registration_number', 
                                    $request->get('regnumber') );
            $vehicle->info = $request->get('notes');
            $vehicle->update();
        }
        else
        {
            $vehicle->vehicle_class_id = $request->get('vehicle_class');
            $vehicle->info = $request->get('notes');
            $vehicle->registration_number = $request->get('regnumber');
            $vehicle->update();
        }
    
        /* capture MEMBER VEHICLE details */
        if( $member_record->is_member_associated == true )
        {
            /* capture MEMBER REGION, ASSOCIATION details */
            $member_region_association->region_id = $request->get('region');
            $member_region_association->association_id = $request->get('association');
            $member_region_association->update();
            
            if( !empty($request->get('route')) ) 
            {
                foreach((array)$request->get('route') as $checkbox_value) 
                {
                    /* capture ROUTE VEHICLE details */
                    $route_vehicle->route_id = $checkbox_value;
                    $route_vehicle->vehicle_id = $vehicle->id;
                    $route_vehicle->update();
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicle = Vehicle::find($id);
        $route_vehicle = RouteVehicle::where('vehicle_id', $id);
        $member_vehicle = MemberVehicle::where('vehicle_id', $id);
        $member_record = Member::where('id', $member_vehicle->member_id);
        $member_region_association = MemberRegionAssociation::where('member_id',
                                                $member_vehicle->member_id);

        $member_region_association->delete();
        $route_vehicle->delete();
        $member_vehicle->delete();
        $vehicle->delete();

        return redirect()->intended('vehicles.edit', 
                                        $member_record->id);
    }
}
