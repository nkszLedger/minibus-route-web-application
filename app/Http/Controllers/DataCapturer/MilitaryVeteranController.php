<?php

namespace App\Http\Controllers\DataCapturer;

use App\City;
use App\Gender;
use App\Http\Controllers\Controller;
use App\Http\Requests\MilitaryVeteranPostRequest;
use App\Http\Requests\MilitaryVeteranUpdateRequest;
use App\MilitaryVeteran;
use App\MilitaryVeteranFingerprint;
use App\MilitaryVeteranPortrait;
use App\MilitaryVeteransDelegatedSchools;
use App\Province;
use App\Region;
use App\School;
use Illuminate\Http\Request;

class MilitaryVeteranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_military_veterans = MilitaryVeteran::with(['city', 'province',
                                        'region', 'gender'])
                            ->orderBy('id','desc')->get();

        return view('datacapturer.military.veterans.index', 
                    compact(['all_military_veterans']));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_cities = City::all();
        $all_gender = Gender::all();
        $all_provinces = Province::all();
        $all_regions = Region::all();
        $all_schools = School::with(['region',
                            'level', 'sector', 'type',
                            'metropolitan_municipality',
                            'local_municipality',
                            ])->get();

        return view('datacapturer.military.veterans.create', 
                compact(['all_cities', 
                            'all_gender',
                            'all_provinces', 
                            'all_regions',
                            'all_schools',
                        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\MilitaryVeteranPostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MilitaryVeteranPostRequest $request)
    {
        // The incoming request is valid...
         $validated = $request->validated();

        if( $validated )
        {
            $military_veteran = new MilitaryVeteran();

            $military_veteran->name =  $request->get('name');
            $military_veteran->surname =  $request->get('surname');
            $military_veteran->id_number =  $request->get('id_number');

            $military_veteran->phone_number =  $request->get('phone_number');
            $military_veteran->email =  $request->get('email');
            $military_veteran->address_line =  $request->get('address_line');

            $military_veteran->surburb =  $request->get('surburb');
            $military_veteran->postal_code =  $request->get('postal_code');
            $military_veteran->city_id =  $request->get('city');

            $military_veteran->province_id =  $request->get('province');
            $military_veteran->gender_id =  $request->get('gender');
            $military_veteran->region_id =  $request->get('mvregion');

            $military_veteran->emergency_contact_name =  $request->get('emergency_contact_name');
            $military_veteran->emergency_contact_relationship =  $request->get('emergency_contact_relationship');
            $military_veteran->emergency_contact_number =  $request->get('emergency_contact_number');

            $military_veteran->region_leader_name =  $request->get('region_leader_name');
            $military_veteran->region_leader_contact_number =  $request->get('region_leader_contact_number');
            $military_veteran->number_of_delegated_schools =  $request->get('number_of_delegated_schools');

            if ( $military_veteran->save() )
            {
                if( !empty($request->get('list_of_delegated_schools')) ) 
                {
                    foreach((array)$request->get('list_of_delegated_schools') as $school_id) 
                    {
                        /* get delegated schools to military-veteran */
                        $delegated_school = new MilitaryVeteransDelegatedSchools();
                        $delegated_school->military_veteran_id = $military_veteran->id;
                        $delegated_school->school_id = $school_id;
                        $delegated_school->save();
                    }
                }
            }

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
        $all_cities = City::all();
        $all_gender = Gender::all();
        $all_provinces = Province::all();
        $all_regions = Region::all();

        $military_veteran = MilitaryVeteran::with(['region', 'province',
                        'city', 'gender'])->where('id', $id)->first();
        
        $delegated_schools = MilitaryVeteransDelegatedSchools::with([
            'school', 'military_veteran'])->where('military_veteran_id', $id)->get();

        $military_veteran_fingerprint = MilitaryVeteranFingerprint::where(
            'military_veteran_id', $id)->get();
        $military_veteran_portrait = MilitaryVeteranPortrait::where(
            'military_veteran_id', $id)->get();

        return view('datacapturer.military.veterans.show', 
                    compact(['all_cities', 
                            'all_gender',
                            'all_provinces', 
                            'all_regions',
                            'military_veteran',
                            'delegated_schools',
                            'military_veteran_fingerprint',
                            'military_veteran_portrait'
                        ]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $all_cities = City::all();
        $all_gender = Gender::all();
        $all_provinces = Province::all();
        $all_regions = Region::all();
        $all_schools = School::with(['region',
                            'level', 'sector', 'type',
                            'metropolitan_municipality',
                            'local_municipality',
                            ])->get();

        $military_veteran = MilitaryVeteran::with(['region', 'province',
                        'city', 'gender'])->where('id', $id)->first();
        
        $delegated_schools = MilitaryVeteransDelegatedSchools::with([
            'school', 'military_veteran'])->where('military_veteran_id', $id)
            ->where('deleted_at', NULL)->get();

        return view('datacapturer.military.veterans.create', 
                compact(['all_cities', 
                            'all_gender',
                            'all_provinces', 
                            'all_regions',
                            'military_veteran',
                            'all_schools',
                            'delegated_schools',
                        ]));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\MilitaryVeteranUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MilitaryVeteranUpdateRequest $request, $id)
    {
        // The incoming request is valid...
        $validated = $request->validated();

        $military_veteran = MilitaryVeteran::with(['region', 'province',
                        'city', 'gender'])->where('id', $id)->first(); 

        if( $validated )
        {
            $military_veteran_update = array(
                'name' => $request->get('name'),
                'surname' => $request->get('surname'),
                'id_number' => $request->get('id_number'),
                'phone_number' => $request->get('phone_number'),
                'email' => $request->get('email'),
                'address_line' => $request->get('address_line'),
                'surburb' => $request->get('surburb'),
                'postal_code' => $request->get('postal_code'),
                'city_id' => $request->get('city'),
                'province_id' => $request->get('province'),
                'gender_id' => $request->get('gender'),
                'region_id' => $request->get('mvregion'),

                'emergency_contact_name' => 
                    $request->get('emergency_contact_name'),
                'emergency_contact_relationship' => 
                    $request->get('emergency_contact_relationship'),
                'emergency_contact_number' => 
                    $request->get('emergency_contact_number'),
                'region_leader_name' => 
                    $request->get('region_leader_name'),
                'region_leader_contact_number' => 
                    $request->get('region_leader_contact_number'),
                'number_of_delegated_schools' => 
                    $request->get('number_of_delegated_schools'),
            );

            if( $military_veteran->update($military_veteran_update) )
            {
                /* find and delete delegated schools for military-veteran */
                $all_delegated_schools = MilitaryVeteransDelegatedSchools::with([
                    'school', 'military_veteran'])->where('military_veteran_id', $id)
                    ->where('deleted_at', NULL);
                
                if ( !empty( $all_delegated_schools ) )     
                {
                    $all_delegated_schools->forceDelete();
                }

                if( !empty($request->get('list_of_delegated_schools')) ) 
                {
                    foreach((array)$request->get('list_of_delegated_schools') as $school_id) 
                    {
                        /* write new record */
                        $delegated_school = new MilitaryVeteransDelegatedSchools();
                        $delegated_school->military_veteran_id = $military_veteran->id;
                        $delegated_school->school_id = $school_id;
                        $delegated_school->save();
                    }
                }
            }
        }
        return $this->show($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

}
