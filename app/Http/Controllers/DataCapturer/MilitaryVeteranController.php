<?php

namespace App\Http\Controllers\DataCapturer;

use App\City;
use App\Gender;
use App\Http\Controllers\Controller;
use App\Http\Requests\MilitaryVeteranPostRequest;
use App\Http\Requests\MilitaryVeteranUpdateRequest;
use App\MilitaryVeteran;
use App\Province;
use App\Region;
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
                                        'region', 'position'])
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

        return view('datacapturer.military.veterans.create', 
                compact(['all_cities', 
                            'all_gender',
                            'all_provinces', 
                            'all_regions'
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
            $military_veteran->list_of_delegated_schools =  $request->get('list_of_delegated_schools'); 

            $military_veteran->save();
        }
        
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
        // Inform Rules of the record to validate
        $request->setID($id);
        
        // The incoming request is valid...
        $validated = $request->validated();
    }

}
