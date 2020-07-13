<?php

namespace App\Http\Controllers\DataCapturer;
use App\User;
use App\City;
use App\Gender;
use App\Employee;
use App\EmployeeOrganization;
use App\EmployeeFingerprint;
use App\EmployeePortrait;
use App\EmployeePosition;
use App\Province;
use App\Region;
use App\Facility;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_employees = Employee::with(['city', 
                                    'province',
                                    'region', 'position'])
                            ->orderBy('id','desc')->get();

        return view('datacapturer.employees.index', compact(['all_employees']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_cities = City::all();
        $all_positions = EmployeePosition::all();
        $all_gender = Gender::all();
        $all_provinces = Province::all();
        $all_regions = Region::all();
        $all_facilities =  Facility::all();

        return view('datacapturer.employees.create', compact(['all_cities', 
                                                                'all_positions',
                                                                'all_gender',
                                                                'all_provinces', 
                                                                'all_regions',
                                                                'all_facilities'
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
        if( $request->get('id') != '')
        { 
            $this->update($request, $request->get('id')); 
        }
        else
        {
            $validator = Validator::make(
                [
                    'name' => $request->get('name'),
                    'surname' => $request->get('surname'),
                    'email' => $request->get('email'),
                    'id_number' => $request->get('id_number')
                ],
                [
                    'name' => 'required|max:40|regex:/^[\pL\s\-]+$/u',
                    'surname' => 'required|max:40|regex:/^[\pL\s\-]+$/u',
                    'email' => 'required|unique:employees',
                    'id_number' => 'required|digits:13|unique:employees'
                ]
            );
    
            if ($validator->fails()) 
            {
                $errors = $validator->errors()->first();
                return back()->withErrors($errors)
                            ->withInput();
            }

            $employee = new Employee();
            $organization = new EmployeeOrganization(); 

            /* Finally Capture */
            $employee->name = $request->get('name');
            $employee->surname = $request->get('surname');
            $employee->employee_number = $request->get('employee_number');
            $employee->id_number = $request->get('id_number');
            $employee->phone_number = $request->get('phone_number');
            $employee->email = $request->get('email');
            $employee->emergency_contact_name = $request->get('emergency_contact_name');
            $employee->emergency_contact_relationship = $request->get('emergency_contact_relationship');
            $employee->emergency_contact_number = $request->get('emergency_contact_number');
            $employee->address_line = $request->get('address_line');
            $employee->postal_code = $request->get('postal_code');
            $employee->surburb = $request->get('surburb');
            $employee->city_id = $request->get('city');
            $employee->province_id = $request->get('province');
            $employee->region_id = $request->get('eregion');

            $employee->gender_id = $request->get('gender');
            $employee->position_id = $request->get('position');
            $employee->rank = $request->get('rank');

            /* store employee entry */
            if( $employee->save() )
            {
                $organization->employee_id = $employee->id;
                $organization->association_name = $request->get('association_name');
                $organization->subordinate_taxi_ranks = $request->get('sub_taxi_ranks');
                $organization->regional_coordinator_full_name = $request->get('rcfullname');
                $organization->association_id = $request->get('eassociation');
                $organization->regional_coordinator_contact_details = $request->get('rcphone_number');
                $organization->facility_taxi_rank_id = $request->get('etaxirank');
                $organization->facility_manager_full_name = $request->get('rmfullname');
                $organization->facility_manager_contact_details = $request->get('rmphone_number');

                $organization->save();
            }

            return redirect()->intended('employees');
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
        $employee = Employee::with(['city', 'province',
                                    'region', 'position',
                                    'gender'])
                             ->findOrFail($id);
        $organization = EmployeeOrganization::with(['employee',
                                'association', 'facility'])
                             ->where('employee_id', $id)->first(); 

                            //dd($organization['association']['association_id']);

        $portrait = EmployeePortrait::where('employee_id', $id)->first();
        $fingerprint = EmployeeFingerprint::where('employee_id', $id)->first();

        return view('datacapturer.employees.show', 
                        compact(['employee', 'portrait', 
                                'fingerprint', 'organization']));
        
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
        $all_provinces = Province::all();
        $all_regions = Region::all();
        $all_positions = EmployeePosition::all();
        $all_gender = Gender::all();
        $all_facilities =  Facility::all();

        $employee = Employee::with(['city', 'province',
                                    'region', 'position',
                                    'gender'])
                                ->findOrFail($id);
        $organization = EmployeeOrganization::with(['employee',
                                    'association', 'facility'])
                                ->where('employee_id', $id)->first(); 

        return view('datacapturer.employees.create', compact(['all_cities',
                                                        'all_provinces', 
                                                        'all_regions',
                                                        'all_positions',
                                                        'all_gender',
                                                        'employee',
                                                        'organization',
                                                        'all_facilities']));
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
        $validator = Validator::make(
            [
                'name' => $request->get('name'),
                'surname' => $request->get('surname'),
                'email' => $request->get('email')
            ],
            [
                'name' => 'required|max:40|regex:/^[\pL\s\-]+$/u',
                'surname' => 'required|max:40|regex:/^[\pL\s\-]+$/u',
                'email' => 'required|email|unique:employees,email,'.$id,
            ]
        );

        if ($validator->fails()) 
        {
            $errors = $validator->errors()->first();
            return back()->withErrors($errors)
                        ->withInput();
        }

        $employee = Employee::with(['city', 'province',
                                    'region', 'position',
                                    'gender'])
                                ->findOrFail($request->get('id'));
        $organization = EmployeeOrganization::with(['employee',
                                'association', 'facility'])
                                ->where('employee_id', $id)->first(); 

        $employee_update = array(
            'name' => $request->get('name'),
            'surname' => $request->get('surname'),
            'employee_number' => $request->get('employee_number'),
            'phone_number' => $request->get('phone_number'),
            'emergency_contact_name' => 
                    $request->get('emergency_contact_name'),
            'emergency_contact_relationship' => 
                    $request->get('emergency_contact_relationship'),
            'emergency_contact_number' => 
                    $request->get('emergency_contact_number'),
            'address_line' => $request->get('address_line'),
            'postal_code' => $request->get('postal_code'),
            'surburb' => $request->get('surburb'),
            'city_id' => $request->get('city'),
            'province_id' => $request->get('province'),
            'region_id' => $request->get('eregion'),

            'gender_id' => $request->get('gender'),
            'position_id' => $request->get('position'),
            'rank' => $request->get('rank')
            
        );
        
        /* update employee entry */
        if( $employee->update($employee_update) )
        {
            $organization_update = array(
                'employee_id' => $request->get('id'),
                'regional_coordinator_full_name' => $request->get('rcfullname'),
                'association_name' => $request->get('association_name'),
                'subordinate_taxi_ranks' => $request->get('sub_taxi_ranks'),
                'association_id' => $request->get('eassociation'),
                'regional_coordinator_contact_details' => $request->get('rcphone_number'),
                'facility_taxi_rank_id' => $request->get('etaxirank'),
                'facility_manager_full_name' => $request->get('rmfullname'),
                'facility_manager_contact_details' => $request->get('rmphone_number'),
            );

            /* update employee organization entry */
            $organization->update($organization_update);
        }

        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();

        return redirect()->intended('employees');
    }
}
