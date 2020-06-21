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
use Illuminate\Support\Facades\Validator;
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
        $member_driver = new MemberDriver();
        $member_operator = new MemberOperator();

        //dd("Validation now");
        $validator = Validator::make(
            [
                'id_number' => $request->get('idnumber'),
                'file' => $request->file('operatinglicensefile'),
                'email' => $request->get('emailAddress'),
                'license_number' => $request->get('licensenumber'),
                'operatinglicensenumber' => $request->get('operatinglicensenumber')
            ],
            [
                'id_number' => 'required|unique:members',
                'file' => 'mimes:pdf|max:5000',
                'email' => 'required|unique:members',
                'license_number' => 'required|unique:member_driver', 
                'license_number' => 'required|unique:member_operator'
            ]
        );

        if ($validator->fails()) 
        {
            $errors = $validator->errors()->first();
            return back()->withErrors($errors)
                        ->withInput();
        }

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
                        if( $request->hasFile('operatinglicensefile') )
                        {
                            $file = $request->file('operatinglicensefile');
                            $name = 'MNDOTOPF' . $member->id . 
                                    $request->file('operatinglicensefile')
                                            ->getClientOriginalName();
                            $path = Storage::disk('public')->putFileAs('driverlicensefile', 
                                                            $file, $name);
                        }
                        
                        $member_driver->member_id = $member->id;
                        $member_driver->license_path = $path;
                        $member_driver->valid_since = Carbon::parse($request->get('valid-from'))->format('Y-m-d');
                        $member_driver->valid_until = Carbon::parse($request->get('valid-until'))->format('Y-m-d');
                        $member_driver->license_number = $request->get('licensenumber');
                        $member_driver->membership_number = $request->get('associationmembershipnumber');
                        $member_driver->driving_licence_code_id = $request->get('drivinglicencecodes');
                        $member_driver->save();
                        break;
                        

                    case "2":
                        /* Member is a Operator */
                        if( $request->hasFile('operatinglicensefile') )
                        {
                            $file = $request->file('operatinglicensefile');
                            $name = 'MNDOTOPF' . $member->id . $file->getClientOriginalName();
                            $path = Storage::disk('public')->putFileAs('operatinglicensefile', 
                                                            $file, $name);
                        }

                        $member_operator->license_path = $path;
                        $member_operator->member_id = $member->id;
                        $member_operator->membership_number = $request->get('associationmembershipnumber');
                        $member_operator->license_number = $request->get('operatinglicensenumber');
                        $member_operator->valid_since = Carbon::parse($request->get('valid-from'))->format('Y-m-d');
                        $member_operator->valid_until = Carbon::parse($request->get('valid-until'))->format('Y-m-d');
                        $member_operator->save();
                        break;

                    case "3":
                        /* Member is a Driver */
                        if( $request->hasFile('operatinglicensefile') )
                        {
                            
                            $file = $request->file('operatinglicensefile');
                            $name = 'MNDOTOPF' . $member->id . $file->getClientOriginalName();
                            $path = Storage::disk('public')->putFileAs('driverlicensefile', 
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
                        if( $request->hasFile('operatinglicensefile') )
                        {
                            $file = $request->file('operatinglicensefile');
                            $name = 'MNDOTOPF' . $member->id . $file->getClientOriginalName();
                            $path = Storage::disk('public')->putFileAs('operatinglicensefile', 
                                                            $file, $name);
                        }

                        $member_operator->license_path = $path;
                        $member_operator->member_id = $member->id;
                        $member_operator->membership_number = $request->get('associationmembershipnumber');
                        $member_operator->license_number = $request->get('operatinglicensenumber');
                        $member_operator->valid_since = $request->get('valid-from');
                        $member_operator->valid_until = $request->get('valid-until');
                        $member_operator->save();

                        break;
                    default:
                        /* should never reach */
                } 

            }
            else
            {
                $errors = 'Unexpected error occured. 
                            Member Profile could not be created.
                                Please try again later';

                    return back()->withErrors($errors)
                            ->withInput();
            }

            /* finally */
            return $this->index();

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
            $member_vehicle_id = $member_vehicles['vehicle']['id'];
            $member_region_association = MemberRegionAssociation::where('member_id', $id)->get();
            $association = Association::where('association_id', 
                $member_region_association[0]['association_id'] )->get()[0];

            $region = Region::where('region_id', $member_region_association[0]['region_id'] )->get()[0];
            $route_vehicle = RouteVehicle::where('vehicle_id', $member_vehicle_id )->get();
            $all_routes = Route::whereIn('id', function ($query) use($member_vehicle_id){
                                                            $query->select('route_id')
                                                                ->from('route_vehicle')
                                                                ->whereColumn('route_id', 'routes.id')
                                                                ->where('vehicle_id','=' , $member_vehicle_id);
                                                            })->get();
                                
            return view('datacapturer.members.show', 
                                    compact(['member_record', 
                                                'vehicle', 'driver',
                                                'region', 'association',
                                                'operator','all_routes', 
                                                'all_associations',
                                                'all_membership_types',
                                                'all_regions', 'all_cities'
                                                ]));
        }
        else
        {
            return view('datacapturer.members.show', 
                                compact(['member_record', 
                                            'vehicle', 'driver',
                                            'operator',
                                            'all_membership_types',
                                            'all_cities', 'all_gender'
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
        $member = Member::find($id);
        $member_driver = MemberDriver::where('member_id', $id);
        $member_operator = MemberOperator::where('member_id', $id);

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
                    if( $request->hasFile('operatinglicensefile') )
                    {
                        Storage::disk('public')->delete('storage/'.$member_driver->license_path);
                        $file = $request->file('operatinglicensefile');
                        $name = 'MNDOTOPF' . $member->id . $file->getClientOriginalName();
                        $path = Storage::disk('public')->putFileAs('driverslicensefile', 
                                                        $file, $name);
                        $member_driver->license_path = $path;
                    }
                    
                    /* Update member driver */
                    $member_driver = DB::table('member_driver')
                        ->where('member_id', $id)
                        ->update(['valid_since' => Carbon::parse($request->get('valid-from'))->format('Y-m-d'),
                                'valid_until' => Carbon::parse($request->get('valid-until'))->format('Y-m-d'),
                                'license_number' => $request->get('licensenumber'),
                                'license_path' => $path,
                                'membership_number' => $request->get('associationmembershipnumber'),
                                'driving_licence_code_id' => $request->get('drivinglicencecodes')
                        ]);
                    break;
                    

                case "2":
                    /* Member is a Operator */
                    if( $request->hasFile('operatinglicensefile') )
                    {
                        Storage::disk('public')->delete('storage/'.$member_operator->license_path);
                        $file = $request->file('operatinglicensefile');
                        $name = 'MNDOTOPF' . $member->id . $file->getClientOriginalName();
                        $path = Storage::disk('public')->putFileAs('operatinglicensefile', 
                                                        $file, $name);
                        $member_operator->license_path = $path;
                    }

                    /* Update member operator */
                    $member_operator = DB::table('member_operator')
                        ->where('member_id', $id)
                        ->update(['valid_since' => Carbon::parse($request->get('valid-from'))->format('Y-m-d'),
                                'valid_until' => Carbon::parse($request->get('valid-until'))->format('Y-m-d'),
                                'license_number' => $request->get('licensenumber'),
                                'license_path' => $path,
                                'membership_number' => $request->get('associationmembershipnumber')
                        ]);
                    break;

                case "3":
                    /* Member is a Driver */
                    if( $request->hasFile('operatinglicensefile') )
                    {
                        Storage::disk('public')->delete('storage/'.$member_driver->license_path);
                        $file = $request->file('operatinglicensefile');
                        $name = 'MNDOTOPF' . $member->id . $file->getClientOriginalName();
                        $path = Storage::disk('public')->putFileAs('driverslicensefile', 
                                                        $file, $name);
                        $member_driver->license_path = $path;
                    }
                    
                    /* Update member driver */
                    $member_driver = DB::table('member_driver')
                        ->where('member_id', $id)
                        ->update(['valid_since' => Carbon::parse($request->get('valid-from'))->format('Y-m-d'),
                                'valid_until' => Carbon::parse($request->get('valid-until'))->format('Y-m-d'),
                                'license_number' => $request->get('licensenumber'),
                                'license_path' => $path,
                                'membership_number' => $request->get('associationmembershipnumber'),
                                'driving_licence_code_id' => $request->get('drivinglicencecodes')
                        ]);

                    /* Member is a Operator */
                    if( $request->hasFile('operatinglicensefile') )
                    {
                        Storage::disk('public')->delete('storage/'.$member_operator->license_path);
                        $file = $request->file('operatinglicensefile');
                        $name = 'MNDOTOPF' . $member->id . $file->getClientOriginalName();
                        $path = Storage::disk('public')->putFileAs('operatinglicensefile', 
                                                        $file, $name);
                        $member_operator->license_path = $path;
                    }

                    /* Update member operator */
                    $member_operator = DB::table('member_operator')
                        ->where('member_id', $id)
                        ->update(['valid_since' => Carbon::parse($request->get('valid-from'))->format('Y-m-d'),
                                'valid_until' => Carbon::parse($request->get('valid-until'))->format('Y-m-d'),
                                'license_number' => $request->get('licensenumber'),
                                'license_path' => $path,
                                'membership_number' => $request->get('associationmembershipnumber')
                        ]);

                    break;
                default:
                    /* should never reach */
            } 

        }

        return $this->show($member->id);
        
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
