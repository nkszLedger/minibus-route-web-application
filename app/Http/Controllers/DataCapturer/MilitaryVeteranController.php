<?php

namespace App\Http\Controllers\DataCapturer;

use App\Bank;
use App\BankAccount;
use App\BankAccountType;
use App\City;
use App\Gender;
use App\Http\Controllers\Controller;
use App\Http\Requests\MilitaryVeteranPostRequest;
use App\Http\Requests\MilitaryVeteranUpdateRequest;
use App\MilitaryVeteran;
use App\MilitaryVeteranFingerprint;
use App\MilitaryVeteranPortrait;
use App\MilitaryVeteransDelegatedSchools;
use App\MilitaryVeteranVerification;
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
                                        'region', 'gender', 'bank_account', 'verification',
                                        'military_veteran_delegated_school.school'])
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

        $all_banks = Bank::all();
        $all_bank_account_types = BankAccountType::all();

        return view('datacapturer.military.veterans.create', 
                compact(['all_cities', 
                            'all_gender',
                            'all_provinces', 
                            'all_regions',
                            'all_schools',
                            'all_banks',
                            'all_bank_account_types'
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
            $bank_account_details = new BankAccount();
            $bank_account_details->bank_id = $request->get('bank');
            $bank_account_details->branch_name = $request->get('branch_name');
            $bank_account_details->branch_code = $request->get('branch_code');
            $bank_account_details->account_number = $request->get('account_number');
            $bank_account_details->account_holder = $request->get('account_holder');
            $bank_account_details->bank_account_type_id = $request->get('bank_account_type');

            if( $bank_account_details->save() )
            {
                $military_veteran = new MilitaryVeteran();

                $military_veteran->bank_account_id = $bank_account_details->id;

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

                $military_veteran->military_formation =  $request->get('military_formation');
                $military_veteran->alternative_number =  $request->get('alternative_number');
                $military_veteran->force_number =  $request->get('force_number');

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

                    /* Add verification details */
                    $verification = new MilitaryVeteranVerification();
                    $verification->military_veteran_id = $military_veteran->id;
                    $verification->association_approved = false;
                    $verification->letter_issued = false;
                    $verification->letter_signed = false;
                    $verification->banking_details_confirmed = false;
                    
                    $verification->save();
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

        $all_banks = Bank::all();
        $all_bank_account_types = BankAccountType::all();

        $military_veteran = MilitaryVeteran::with(['region', 'province',
                'city', 'gender', 'bank_account'])->where('id', $id)->first();

        $bank_details = Bank::where('id', 
        $military_veteran->bank_account->bank_id)->first();

        $bank_account_type_details = BankAccountType::where('id', 
            $military_veteran->bank_account->bank_account_type_id)->first();
        
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
                            'all_banks',
                            'all_bank_account_types',
                            'bank_details',
                            'bank_account_type_details',
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

        $all_banks = Bank::all();
        $all_bank_account_types = BankAccountType::all();

        $military_veteran = MilitaryVeteran::with(['region', 'province',
                        'city', 'gender'])->where('id', $id)->first();
        
        $bank_details = Bank::where('id', 
            $military_veteran->bank_account->bank_id)->first();

        $bank_account_type_details = BankAccountType::where('id', 
            $military_veteran->bank_account->bank_account_type_id)->first();

        $delegated_schools = MilitaryVeteransDelegatedSchools::with([
            'school', 'military_veteran'])->where('military_veteran_id', $id)
            ->where('deleted_at', NULL)->get();

        return view('datacapturer.military.veterans.create', 
                compact(['all_cities', 
                            'all_gender',
                            'all_provinces', 
                            'all_regions',
                            'all_banks',
                            'all_bank_account_types',
                            'bank_details',
                            'bank_account_type_details',
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
        $military_veteran_bank_account_details = BankAccount::where('id',
                        $military_veteran->bank_account_id);

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

                'bank_account_id' => $military_veteran->bank_account_id,

                'military_formation' => 
                    $request->get('military_formation'),
                'alternative_number' => 
                    $request->get('alternative_number'),
                'force_number' => $request->get('force_number'),

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

                /* update military-veteran banking details */
                $bank_account_details_update = array(
                    'bank_id' =>  $request->get('bank'),
                    'branch_name' =>  $request->get('branch_name'),
                    'branch_code' =>  $request->get('branch_code'),
                    'account_number' =>  $request->get('account_number'),
                    'account_holder' =>  $request->get('account_holder'),
                    'bank_account_type_id' =>  $request->get('bank_account_type'),
                );

                $military_veteran_bank_account_details->update($bank_account_details_update);
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
