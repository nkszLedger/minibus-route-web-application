<?php

namespace App\Http\Controllers\DataCapturer;

use Carbon\Carbon;
use App\Association;
use App\Member;
use App\MembershipType;
use App\MemberVehicle;
use App\MemberDriver;
use App\MemberOperator;
use App\MemberPortrait;
use App\Region;
use App\Gender;
use App\Route;
use App\Vehicle;
use App\VehicleClass;
use App\City;
use App\MemberFingerprint;
use App\RouteVehicle;
use App\Http\Controllers\Controller;
use App\MemberRegionAssociation;
use App\DrivingLicenceCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Exists;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_members = Member::with(['membership_type', 
                                     'city'])->orderBy('id','desc')->get();

        return view('datacapturer.members.index', 
                    compact(['all_members']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_cities = City::all();
        $all_regions = Region::all();
        $all_gender = Gender::all();
        $all_driving_licence_codes = DrivingLicenceCode::all();
        $all_associations = Association::all();
        $all_membership_types = MembershipType::all();

        return view('datacapturer.members.create',      
                            compact(['all_membership_types',
                                        'all_regions',
                                        'all_associations', 
                                        'all_cities', 'all_gender',
                                        'all_driving_licence_codes'
                                    ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* Redirects Mass Data */
        $all_cities = City::all();
        $all_regions = Region::all();
        $all_gender = Gender::all();
        $all_driving_licence_codes = DrivingLicenceCode::all();
        $all_associations = Association::all();
        $all_membership_types = MembershipType::all();
        $all_vehicle_classes = VehicleClass::all();

        /* Init instances */
        $member = new Member();
        $vehicle = new Vehicle();
        $member_vehicle = new MemberVehicle();
        $member_driver = new MemberDriver();
        $member_operator = new MemberOperator();
        $route_vehicle = new RouteVehicle();
        $member_region_association = new MemberRegionAssociation();

        if( $request->get('member_id') == null )
        {
            /* capture MEMBER details */
            $member->name = $request->get('firstName');
            $member->surname = $request->get('lastName');
            $member->id_number = $request->get('idnumber');
            $member->email = $request->get('emailAddress');
            $member->phone_number = $request->get('phonenumber');
            $member->address_line = $request->get('addressline1');
            $member->postal_code = $request->get('postal-code');
            $member->emergency_contact_name = $request->get('emergency_contact_name');
            $member->emergency_contact_relationship = $request->get('emergency_contact_relationship');
            $member->emergency_contact_number = $request->get('emergency_contact_number');
            $member->surburb = $request->get('surburb');
            $member->gender_id = $request->get('gender');
            $member->city_id = $request->get('city');
            $member->is_member_associated =  $request->has('ismemberassociated');
            $member->membership_type_id = $request->get('membership-type'); 

            if( $member->save() )
            {
                /* capture MEMBER DRIVER & OPERATOR details */
                $path = '';
                switch ( $request->get('membership-type') ) 
                {
                    case "1":
                        /* Member is a Driver */
                        if( $request->hasFile('createoperatinglicensefile') )
                        {
                            $file = $request->file('createoperatinglicensefile');
                            $name = 'MNDOTOPF' . $member->id . '.' . $file->guessExtension();
                            $path = Storage::disk('local')->putFileAs('driveroperatinglicensefile', 
                                                            $file, $name);
                        }
                        
                        $member_driver->member_id = $member->id;
                        $member_driver->license_path = $path;
                        $member_driver->valid_since = Carbon::parse($request->get('valid_since'))->format('Y-m-d');
                        $member_driver->valid_until = Carbon::parse($request->get('valid_until'))->format('Y-m-d');
                        $member_driver->license_number = $request->get('licensenumber');
                        $member_driver->membership_number = $request->get('operatinglicensenumber');
                        $member_driver->driving_licence_code_id = $request->get('drivinglicencecodes');
                        $member_driver->save();
                        break;
                        

                    case "2":
                        /* Member is a Operator */
                        if( $request->hasFile('createoperatinglicensefile') )
                        {
                            $file = $request->file('createoperatinglicensefile');
                            $name = 'MNDOTOPF' . $member->id . '.' . $file->guessExtension();
                            $path = Storage::disk('local')->putFileAs('operatinglicensefile', 
                                                            $file, $name);
                        }

                        $member_operator->license_path = $path;
                        $member_operator->member_id = $member->id;
                        $member_operator->membership_number = $request->get('');
                        $member_operator->license_number = $request->get('operatinglicensenumber');
                        $member_operator->valid_since = Carbon::parse($request->get('valid_since'))->format('Y-m-d');
                        $member_operator->valid_until = Carbon::parse($request->get('valid_until'))->format('Y-m-d');
                        $member_operator->save();
                        break;

                    case "3":
                        /* Member is a Driver */
                        if( $request->hasFile('createoperatinglicensefile') )
                        {
                            $file = $request->file('createoperatinglicensefile');
                            $name = 'MNDOTOPF' . $member->id . '.' . $file->guessExtension();
                            $path = Storage::disk('local')->putFileAs('driveroperatinglicensefile', 
                                                            $file, $name);
                        }
                        
                        $member_driver->member_id = $member->id;
                        $member_driver->license_path = $path;
                        $member_driver->valid_since = $request->get('valid_since');
                        $member_driver->valid_until = $request->get('valid_until');
                        $member_driver->license_number = $request->get('licensenumber');
                        $member_driver->membership_number = $request->get('associationmembershipnumber');
                        $member_driver->driving_licence_code_id = $request->get('drivinglicencecodes');
                        $member_driver->save();

                        /* Member is a Operator */
                        if( $request->hasFile('createoperatinglicensefile') )
                        {
                            $file = $request->file('createoperatinglicensefile');
                            $name = 'MNDOTOPF' . $member->id . '.' . $file->guessExtension();
                            $path = Storage::disk('local')->putFileAs('operatinglicensefile', 
                                                            $file, $name);
                        }

                        $member_operator->license_path = $path;
                        $member_operator->member_id = $member->id;
                        $member_operator->membership_number = $request->get('associationmembershipnumber');
                        $member_operator->license_number = $request->get('operatinglicensenumber');
                        $member_operator->valid_since = $request->get('valid_since');
                        $member_operator->valid_until = $request->get('valid_until');
                        $member_operator->save();

                        break;
                    default:
                        /* should never reach */
                } 

            }
            else
            {
                $error = 'Unexpected error occured. 
                            Member Profile could not be created.
                                Please try again later';

                return view('datacapturer.members.create',      
                                        compact(['all_membership_types',
                                                    'all_regions',
                                                    'all_associations', 
                                                    'all_cities', 'all_gender',
                                                    'all_driving_licence_codes',
                                                    'error'
                                                ]));
            }

            /* finally */
            $member_record = Member::with(['membership_type', 'gender',
                                        'city'])->findOrFail($member->id);

            $portrait = MemberPortrait::where('member_id', $member->id)->get();
            $fingerprint = MemberFingerprint::where('member_id', $member->id)->get();

            return view('datacapturer.members.create',      
                                        compact([   'member_record',
                                                    'all_membership_types',
                                                    'all_regions',
                                                    'all_associations', 
                                                    'all_cities', 'all_gender',
                                                    'all_driving_licence_codes',
                                                    'all_vehicle_classes',
                                                    'member_driver', 
                                                    'member_operator',
                                                    'portrait', 'fingerprint'
                                                ]));

        }
        else
        {
            /* capture Vehicle Details */
            if( Vehicle::where('registration_number', $request->get('regnumber') )->count() > 0)
            {
                $vehicle = Vehicle::where('registration_number', $request->get('regnumber') );
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
            $member_vehicle->member_id = $request->get('member_id');
            $member_vehicle->vehicle_id = $vehicle->id;
            $member_vehicle->save();

            if( $request->has('ismemberassociated') )
            {
                /* capture MEMBER REGION, ASSOCIATION details */
                $member_region_association->member_id = $request->get('member_id');
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
            $member_id = $member_vehicle->member_id;
            
            $member_record = Member::with(['membership_type', 'gender',
                                            'city'])->findOrFail($member_id);

            $member_driver = MemberDriver::with(['codes'])
                                          ->findOrFail($member_id);

            $member_operator = MemberOperator::where('member_id', $member_id)->get();

            $member_vehicles = MemberVehicle::where('member_id', $member_id)
                                            ->with(['vehicles.vehicleclass.type'])
                                            ->get();
            
            return view('datacapturer.members.create',      
                                        compact([   'member_record',
                                                    'all_membership_types',
                                                    'all_regions',
                                                    'all_associations', 
                                                    'all_cities', 'all_gender',
                                                    'all_driving_licence_codes',
                                                    'all_vehicle_classes',
                                                    'member_driver', 
                                                    'member_operator',
                                                    'member_vehicles',
                                                ]));


        }								
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member_record = Member::with(['membership_type',
                                        'city', 'gender'])->findOrFail($id);
        
        $portrait = MemberPortrait::where('member_id', $id)->get();
        $fingerprint = MemberFingerprint::where('member_id', $id)->get();

        $member_driver = MemberDriver::with(['codes'])
                                          ->findOrFail($id);

        $member_operator = MemberOperator::where('member_id', $id)->get();

        $member_vehicles = MemberVehicle::where('member_id', $id)
                                        ->with(['vehicles.vehicleclass.type'])
                                        ->get();

        $all_membership_types = MembershipType::all();
        $all_associations = Association::all();
        $all_regions = Region::all();
        $all_cities = City::all();
        $all_gender = Gender::all();
        $all_driving_licence_codes = DrivingLicenceCode::all();

        return view('datacapturer.members.show', 
        compact(['member_record', 
                    'portrait',
                    'fingerprint',
                    'member_driver', 
                    'member_operator',
                    'member_vehicles',
                    'all_membership_types',
                    'all_associations',
                    'all_regions',
                    'all_cities',
                    'all_gender',
                    'all_driving_licence_codes'
                ]));
        
        if( $member_record->is_member_associated & 
            count(MemberVehicle::where('member_id', $id)->get()) > 0 )
        {
            // $member_vehicle_id = $member_vehicles['vehicle']['id'];
            // $member_region_association = MemberRegionAssociation::where('member_id', $id)->get();
            // $association = Association::where('association_id', 
            //     $member_region_association[0]['association_id'] )->get()[0];

            // $region = Region::where('region_id', $member_region_association[0]['region_id'] )->get()[0];
            // $route_vehicle = RouteVehicle::where('vehicle_id', $member_vehicle_id )->get();
            // $all_routes = Route::whereIn('id', function ($query) use($member_vehicle_id){
            //                                                 $query->select('route_id')
            //                                                     ->from('route_vehicle')
            //                                                     ->whereColumn('route_id', 'routes.id')
            //                                                     ->where('vehicle_id','=' , $member_vehicle_id);
            //                                                 })->get();
                                
            // return view('datacapturer.members.show', 
            //                         compact(['member_record', 
            //                                     'vehicle', 'driver',
            //                                     'region', 'association',

            //                                     'operator','all_routes', 
            //                                     'all_associations',
            //                                     'all_membership_types',
            //                                     'all_regions', 'all_cities'
            //                                     ]));
        }
        else
        {
            // return view('datacapturer.members.show', 
            //                     compact(['member_record', 
            //                                 'vehicle', 'driver',
            //                                 'operator',
            //                                 'all_membership_types',
            //                                 'all_cities', 'all_gender'
            //                                 ]));
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member_record = Member::with(['membership_type', 'gender',
                                        'city'])->findOrFail($id);

        $member_driver = MemberDriver::with(['codes'])
                                        ->findOrFail($id);
                                        
        $member_operator = MemberOperator::where('member_id', $id)
                                        ->get();
                                        
        $member_vehicles = MemberVehicle::where('member_id', $id)
                                        ->with(['vehicles.vehicleclass.type'])
                                        ->get();

        $all_membership_types = MembershipType::all();
        $all_associations = Association::all();
        $all_regions = Region::all();
        $all_cities = City::all();
        $all_gender = Gender::all();
        $all_driving_licence_codes = DrivingLicenceCode::all();
        $all_vehicle_classes = VehicleClass::all();

        return view('datacapturer.members.edit',      
                                    compact([   'member_record',
                                                'member_driver', 
                                                'member_operator',
                                                'member_vehicles',
                                                'all_membership_types',
                                                'all_regions',
                                                'all_associations', 
                                                'all_cities', 'all_gender',
                                                'all_driving_licence_codes',
                                                'all_vehicle_classes',
                                            ]));
                                    
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
        /* Init instances */
        $member = Member::where('id', $id)->get();
        $member_vehicle = MemberVehicle::where('member_id', $member->id);
        $member_driver = MemberDriver::where('member_id', $member->id); 
        $member_operator = MemberOperator::where('member_id', $member->id);
        $member_region_association = MemberRegionAssociation::where('member_id', $member->id);
        $vehicle = Vehicle::where('id', $member_vehicle->vehicle_id );

        /* clear route vehicle */
        $result = RouteVehicle::where('vehicle_id', $member_vehicle->vehicle_id)->delete();
        
        $route_vehicle = new RouteVehicle();

        /* capture MEMBER details */
        $member->name = $request->get('firstName');
        $member->surname = $request->get('lastName');
        $member->id_number = $request->get('idnumber');
        $member->email = $request->get('emailAddress');
        $member->phone_number = $request->get('phonenumber');
        $member->address_line = $request->get('addressline1');
        $member->postal_code = $request->get('postal-code');
        $member->city_id = $request->get('city');
        $member->is_member_associated =  $request->has('ismemberassociated');
        $member->membership_type_id = $request->get('membership-type'); 

        if( $member->save() ) 
        {
            /* capture VEHICLE details */
            $vehicle->registration_number = $request->get('regnumber');
            $vehicle->make = $request->get('vehiclemake');
            $vehicle->model = $request->get('vehiclemodel');
            $vehicle->year = $request->get('vehicleyear');
            $vehicle->seats_number = $request->get('vehicleseats');

            if( $vehicle->save() ) 
            {
                /* capture MEMBER VEHICLE details */
                $member_vehicle->member_id  = $member->id;
                $member_vehicle->vehicle_id = $vehicle->id;
                $member_vehicle->save();

                /* capture MEMBER DRIVER & OPERATOR details */
                switch ( $request->get('membership-type') ) 
                {
                    case "1":
                      /* Member is a Driver */
                      $member_driver->member_id = $member->id;
                      $member_driver->license_id = $request->get('licensenumber');
                      $member_driver->save();
                      break;

                    case "2":
                       /* Member is a Operator */
                       if( $request->hasFile('operatinglicensefile') )
                       {
                           $file = $request->file('operatinglicensefile');
                           $name = 'MNDOTOPF' . $member->id . '.' . $file->guessExtension();
                           $path = Storage::disk('local')->putFileAs('operatinglicensefile', 
                                                           $file, $name);

                           $member_operator->member_id = $member->id;
                           $member_operator->license_id = $request->get('operatinglicensenumber');
                           $member_operator->license_path = $path;
                           $member_operator->save();
                       }
                      break;

                    case "3":
                        /* Member is a Driver */
                        $member_driver->member_id = $member->id;
                        $member_driver->license_id = $request->get('licensenumber');
                        $member_driver->save();

                        /* Member is a Operator */
                        if( $request->hasFile('operatinglicensefile') )
                        {
                           $file = $request->file('operatinglicensefile');
                           $name = 'MNDOTOPF' . $member->id . '.' . $file->guessExtension();
                           $path = Storage::disk('local')->putFileAs('operatinglicensefile', 
                                                           $file, $name);

                           $member_operator->member_id = $member->id;
                           $member_operator->license_id = $request->get('operatinglicensenumber');
                           $member_operator->license_path = $path;
                           $member_operator->save();
                        }

                      break;
                    default:
                       /* should never reach */
                } 

                if( $request->has('ismemberassociated') )
                {
                    /* capture MEMBER REGION, ASSOCIATION details */
                    $member_region_association->member_id = $member->id;
                    $member_region_association->region_id = $request->get('region');
                    $member_region_association->association_id = $request->get('association');
                    $member_region_association->save();

                    if( !empty($request->get('route')) ) 
                    {
                        foreach ((array)$request->get('route') as $checkbox_value) 
                        {
                            /* capture ROUTE VEHICLE details */
                            $route_vehicle->route_id = $checkbox_value;
                            $route_vehicle->vehicle_id = $vehicle->id;

                            $route_vehicle->save();
                        }
                    }
                    else { return back()->withErrors('Whoops')->withInput();}
                }
                else { return back()->withErrors('Whoops')->withInput();}
            }
            else { return back()->withErrors('Whoops')->withInput();}
        }
        else { return back()->withErrors('Whoops')->withInput();}

        return redirect()->route('datacapturer.members.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
