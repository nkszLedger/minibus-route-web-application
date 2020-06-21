<?php

namespace App\Http\Controllers\DataCapturer;

use App\Member;
use App\Vehicle;
use App\Region;
use App\Route;
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
        
        $member_vehicles = MemberVehicle::where('member_id', $member_id)
        ->with(['vehicles.vehicleclass.type'])->get();

        $all_regions = Region::all();
        $all_driving_licence_codes = DrivingLicenceCode::all();
        $all_associations = Association::all();
        $all_vehicle_classes = VehicleClass::all();

        return view('datacapturer.vehicles.create', 
                    compact([ 'member_record',
                             'all_regions', 
                             'member_vehicles', 
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
        $member_vehicle = new MemberVehicle();
        $member_region_association = new MemberRegionAssociation();

        $member_record = Member::with(['membership_type'])
        ->findOrFail($request->get('member_id'));

        $all_associations = Association::all();
        $all_regions = Region::all();
        $all_vehicle_classes = VehicleClass::all();
        $all_driving_licence_codes = DrivingLicenceCode::all();

        $validator = Validator::make(
            [
                'registration_number' => $request->get('regnumber'),
                'vehicle_class' => $request->get('vehicle_class'),
                'region' => $request->get('region'), 
                'association' => $request->get('association'),
                'route' => $request->get('route')
                
            ],
            [
                'registration_number' => 'required|unique:vehicle',
                'vehicle_class' => 'required',
                'region' => 'required', 
                'association' => 'required',
                'route' => 'required'
            ]
        );

        if ($validator->fails()) 
        {
            $errors = $validator->errors()->first();
            return back()->withErrors($errors)
                        ->withInput();
        }

        
        $vehicle->vehicle_class_id = $request->get('vehicle_class');
        $vehicle->info = $request->get('notes');
        $vehicle->registration_number = $request->get('regnumber');
        $vehicle->save();

        /* capture MEMBER VEHICLE details */
        $member_vehicle->member_id = $member_record->id;
        $member_vehicle->vehicle_id = $vehicle->id;
        $member_vehicle->save();

        if( $member_record->is_member_associated )
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
                    $route_vehicle = new RouteVehicle();
                    $route_vehicle->route_id = $checkbox_value;
                    $route_vehicle->vehicle_id = $vehicle->id;
                    $route_vehicle->save();
                }
            }
        }

        /* finally */
        $member_vehicles = MemberVehicle::where('member_id', $member_record->id)
                                        ->with(['vehicles.vehicleclass.type'])
                                        ->get();
        
        return view('datacapturer.vehicles.create',      
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

        $vehicle = Vehicle::with(['vehicleclass.type'])->findOrFail($id);

        $member_record = Member::with(['membership_type'])
                                        ->findOrFail($member_vehicles->first()->member_id);

        if( $member_record->is_member_associated )
        {                           
            $member_region_association = MemberRegionAssociation::where('member_id', 
            $member_vehicles->first()->member_id)->get();

            $region = Region::where('region_id', 
            $member_region_association->first()->region_id)
            ->get();

            $association = Association::where('association_id', 
            $member_region_association->first()->association_id)
            ->get();

            $route_vehicle = RouteVehicle::where('vehicle_id', 
            $vehicle->first()->id )->get();

            $all_routes = Route::whereIn('id', 
                function ($query) use( $id ){
                    $query->select('route_id')
                        ->from('route_vehicle')
                        ->whereColumn('route_id', 'routes.id')
                        ->where('vehicle_id', '=' , $id);
                    })->get();
                                
            return view('datacapturer.vehicles.show', compact(['member_record', 
                                                'vehicle','all_routes', 
                                                'region', 'association',
                                                ]));
        }
        return back();

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
        $route_vehicle = RouteVehicle::where('vehicle_id', $id)->first();

        $member_vehicle = MemberVehicle::where('vehicle_id', $id)
        ->first();

        $member_id = $member_vehicle->first()->member_id;
        $member_region_association = MemberRegionAssociation::where('member_id',
                $member_id)->first();

        $vehicle = Vehicle::where('id', $id)->first();

        $routes = RouteVehicle::where('vehicle_id', $id);

        foreach((array)$routes as $route) 
        {
            $routes->delete();
        }

        $route_vehicle->delete();
        $member_vehicle->delete();
        $member_region_association->delete();
        $vehicle->delete();

        return $this->create($member_id);
    }
}
