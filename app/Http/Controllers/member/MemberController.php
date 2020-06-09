<?php

namespace App\Http\Controllers\Member;

use App\Association;
use App\Member;
use App\MembershipType;
use App\MemberVehicle;
use App\MemberDriver;
use App\MemberOperator;
use App\MemberPortrait;
use App\Region;
use App\Route;
use App\Vehicle;
use App\City;
use App\MemberFingerprint;
use App\RouteVehicle;
use App\Http\Controllers\Controller;
use App\MemberRegionAssociation;
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

        return view('member.index', 
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
        $all_associations = Association::all();
        $all_membership_types = MembershipType::all();

        return view('member.create', compact(['all_membership_types',
                                                'all_regions',
                                                'all_associations', 
                                                'all_cities'
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
            $member->city_id = $request->get('city');
            $member->is_member_associated =  $request->has('ismemberassociated');
            $member->membership_type_id = $request->get('membership-type'); 

            $member->save();

            $member_record = Member::with(['membership_type',
                                            'city'])->findOrFail($member->id);

            $driver = MemberDriver::where('member_id', $member->id)->get();
            $operator = MemberOperator::where('member_id', $member->id)->get();
            
            $all_membership_types = MembershipType::all();
            $all_associations = Association::all();
            $all_regions = Region::all();
            $all_cities = City::all();

            // if( $member->save() ) 
            // {
            //     /* capture VEHICLE details */
            //     $vehicle->registration_number = $request->get('regnumber');
            //     $vehicle->make = $request->get('vehiclemake');
            //     $vehicle->model = $request->get('vehiclemodel');
            //     $vehicle->year = $request->get('vehicleyear');
            //     $vehicle->seats_number = $request->get('vehicleseats');

            //     if( $vehicle->save() ) 
            //     {
            //         /* capture MEMBER VEHICLE details */
            //         $member_vehicle->member_id = $member->id;
            //         $member_vehicle->vehicle_id = $vehicle->id;
            //         $member_vehicle->save();

            //         /* capture MEMBER DRIVER & OPERATOR details */
            //         switch ( $request->get('membership-type') ) 
            //         {
            //             case "1":
            //               /* Member is a Driver */
            //               $member_driver->member_id = $member->id;
            //               $member_driver->license_id = $request->get('licensenumber');
            //               $member_driver->save();
            //               break;

            //             case "2":
            //                /* Member is a Operator */
            //                if( $request->hasFile('createoperatinglicensefile') )
            //                 {
            //                     $file = $request->file('createoperatinglicensefile');
            //                     $name = 'MNDOTOPF' . $member->id . '.' . $file->guessExtension();
            //                     $path = Storage::disk('local')->putFileAs('createoperatinglicensefile', 
            //                                                     $file, $name);

            //                     $member_operator->member_id = $member->id;
            //                     $member_operator->license_id = $request->get('operatinglicensenumber');
            //                     $member_operator->license_path = $path;
            //                     $member_operator->save();
            //                 }
            //               break;

            //             case "3":
            //                 /* Member is a Driver */
            //                 $member_driver->member_id = $member->id;
            //                 $member_driver->license_id = $request->get('licensenumber');
            //                 $member_driver->save();

            //                 /* Member is a Operator */
            //                 if( $request->hasFile('createoperatinglicensefile') )
            //                 {
            //                     $file = $request->file('createoperatinglicensefile');
            //                     $name = 'MNDOTOPF' . $member->id . '.' . $file->guessExtension();
            //                     $path = Storage::disk('local')->putFileAs('createoperatinglicensefile', 
            //                                                     $file, $name);

            //                     $member_operator->member_id = $member->id;
            //                     $member_operator->license_id = $request->get('operatinglicensenumber');
            //                     $member_operator->license_path = $path;
            //                     $member_operator->save();
            //                 }

            //               break;
            //             default:
            //                /* should never reach */
            //         } 

            //         if( $request->has('ismemberassociated') )
            //         {
            //             /* capture MEMBER REGION, ASSOCIATION details */
            //             $member_region_association->member_id = $member->id;
            //             $member_region_association->region_id = $request->get('region');
            //             $member_region_association->association_id = $request->get('association');
            //             $member_region_association->save();

            //             if( !empty($request->get('route')) ) 
            //             {
            //                 foreach ((array)$request->get('route') as $checkbox_value) 
            //                 {
            //                     /* capture ROUTE VEHICLE details */
            //                     $route_vehicle->route_id = $checkbox_value;
            //                     $route_vehicle->vehicle_id = $vehicle->id;

            //                     $route_vehicle->save();
            //                 }
            //             }
            //             else { return back()->withErrors('Whoops')->withInput();}
            //         }
            //         else { return back()->withErrors('Whoops')->withInput();}
            //     }
            //     else { return back()->withErrors('Whoops')->withInput();}
            // }
            // else { return back()->withErrors('Whoops')->withInput();}

            return view('member.create', compact(['member_record', 
                                                    'driver', 
                                                    'operator','member',
                                                    'all_associations',
                                                    'all_membership_types',
                                                    'all_regions', 'all_cities'
                                                    ]));
        }
        else
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
                $member_vehicle->member_id = $request->get('member_id');
                $member_vehicle->vehicle_id = $vehicle->id;
                $member_vehicle->save();

                /* capture MEMBER DRIVER & OPERATOR details */
                switch ( $request->get('membership-type') ) 
                {
                    case "1":
                        /* Member is a Driver */
                        $member_driver->member_id = $request->get('member_id');
                        $member_driver->license_id = $request->get('licensenumber');
                        $member_driver->save();
                        break;

                    case "2":
                        /* Member is a Operator */
                        if( $request->hasFile('createoperatinglicensefile') )
                        {
                            $file = $request->file('createoperatinglicensefile');
                            $name = 'MNDOTOPF' . $request->get('member_id') . '.' . $file->guessExtension();
                            $path = Storage::disk('local')->putFileAs('createoperatinglicensefile', 
                                                            $file, $name);

                            $member_operator->member_id = $request->get('member_id');
                            $member_operator->license_id = $request->get('operatinglicensenumber');
                            $member_operator->license_path = $path;
                            $member_operator->save();
                        }
                        break;

                    case "3":
                        /* Member is a Driver */
                        $member_driver->member_id = $request->get('member_id');
                        $member_driver->license_id = $request->get('licensenumber');
                        $member_driver->save();

                        /* Member is a Operator */
                        if( $request->hasFile('createoperatinglicensefile') )
                        {
                            $file = $request->file('createoperatinglicensefile');
                            $name = 'MNDOTOPF' . $request->get('member_id') . '.' . $file->guessExtension();
                            $path = Storage::disk('local')->putFileAs('createoperatinglicensefile', 
                                                            $file, $name);

                            $member_operator->member_id = $request->get('member_id');
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
                    $member_region_association->member_id = $request->get('member_id');
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

            $member_id = $request->get('member_id');
            $member_record = Member::with(['membership_type',
                                            'city'])->findOrFail($member_id);

            $member_vehicles = MemberVehicle::where('member_id', $member_id)->get();

            $driver = MemberDriver::where('member_id', $member_id)->get();
            $operator = MemberOperator::where('member_id', $member_id)->get();
            
            $all_membership_types = MembershipType::all();
            $all_associations = Association::all();
            $all_regions = Region::all();
            $all_cities = City::all();
            
            return view('member.create', compact(['member_record', 
                                                    'driver', 'member_vehicles',
                                                    'operator',
                                                    'all_associations',
                                                    'all_membership_types',
                                                    'all_regions', 'all_cities'
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
                                        'city'])->findOrFail($id);
        
        $member_vehicle = MemberVehicle::where('member_id', $id)->get();
        
        $vehicle = Vehicle::where('id', $member_vehicle[0]['vehicle_id'])->get();
        
        $portrait = MemberPortrait::where('member_id', $id)->get();
        $fingerprint = MemberFingerprint::where('member_id', $id)->get();

        $member_vehicle_id = $member_vehicle[0]['id'];

        $driver = MemberDriver::where('member_id', $id)->get();
        $operator = MemberOperator::where('member_id', $id)->get();
        
        $all_membership_types = MembershipType::all();
        $all_associations = Association::all();
        $all_regions = Region::all();
        $all_cities = City::all();
        
        if( $member_record->is_member_associated )
        {
            $member_region_association = MemberRegionAssociation::where('member_id', $id)->get();
            $association = Association::where('association_id', $member_region_association[0]['association_id'] )->get()[0];
            $region = Region::where('region_id', $member_region_association[0]['region_id'] )->get()[0];
            $route_vehicle = RouteVehicle::where('vehicle_id', $member_vehicle_id )->get();
            $all_routes = Route::whereIn('id', function ($query) use($member_vehicle_id){
                                                            $query->select('route_id')
                                                                ->from('route_vehicle')
                                                                ->whereColumn('route_id', 'routes.id')
                                                                ->where('vehicle_id','=' , $member_vehicle_id);
                                                            })->get();
                                
            return view('member.show', compact(['member_record', 
                                                'vehicle', 'portrait',
                                                'driver', 'operator',
                                                'fingerprint','all_routes', 
                                                'region', 'association',
                                                'all_associations',
                                                'all_membership_types',
                                                'all_regions', 'all_cities'
                                                ]));
        }
        else
        {
            return view('member.show', compact(['member_record', 
                                                'vehicle', 'portrait',
                                                'driver', 'operator',
                                                'fingerprint',
                                                'all_membership_types',
                                                'all_cities'
                                                ]));
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
        $member_record = Member::with(['membership_type',
                                        'city'])->findOrFail($id);
        
        $member_vehicle = MemberVehicle::where('member_id', $id)->get();
        
        $vehicle = Vehicle::where('id', $member_vehicle[0]['vehicle_id'])->get();

        $member_vehicle_id = $member_vehicle[0]['id'];

        $driver = MemberDriver::where('member_id', $id)->get();
        $operator = MemberOperator::where('member_id', $id)->get();
        
        $all_membership_types = MembershipType::all();
        $all_associations = Association::all();
        $all_regions = Region::all();
        $all_cities = City::all();
        
        if( $member_record->is_member_associated )
        {
            $member_region_association = MemberRegionAssociation::where('member_id', $id)->get();
            $association = Association::where('association_id', $member_region_association[0]['association_id'] )->get()[0];
            $region = Region::where('region_id', $member_region_association[0]['region_id'] )->get()[0];
            $route_vehicle = RouteVehicle::where('vehicle_id', $member_vehicle_id )->get();
            $all_routes = Route::whereIn('id', function ($query) use($member_vehicle_id){
                                                            $query->select('route_id')
                                                                ->from('route_vehicle')
                                                                ->whereColumn('route_id', 'routes.id')
                                                                ->where('vehicle_id','=' , $member_vehicle_id);
                                                            })->get();
                                
            return view('member.edit', compact(['member_record', 
                                                'vehicle', 'driver', 
                                                'operator','all_routes', 
                                                'region', 'association',
                                                'all_associations',
                                                'all_membership_types',
                                                'all_regions', 'all_cities'
                                                ]));
        }
        else
        {
            return view('member.edit', compact(['member_record', 
                                                'vehicle', 
                                                'driver', 'operator',
                                                'all_membership_types',
                                                'all_cities'
                                                ]));
        }
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

        return redirect()->route('members.index');
        
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
