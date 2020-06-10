<?php

namespace App\Http\Controllers\DataCapturer;
use App\User;
use App\City;
use App\Employee;
use App\Province;
use App\Region;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    private function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_employees = Employee::with(['city', 
                                    'province',
                                    'region'])
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
        $all_provinces = Province::all();
        $all_regions = Region::all();

        return view('datacapturer.employees.create', compact(['all_cities', 
                                                                'all_provinces', 
                                                                'all_regions'
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
            $employee = new Employee();

            if( $employee->employee_number == $request->get('employee_number') ||
                count(Employee::where('employee_number', $request->get('employee_number'))->get() ) > 0)
            {
                $error_on_employee_number = 'Employee Number already exists';

                return Redirect::to('datacapturer.employees.create', compact(['all_cities',
                                                            'all_provinces', 
                                                            'all_regions',
                                                            'employee', 'error_on_employee_number']))
                                                            ->withInput();
            }
            if( $employee->id_number == $request->get('id_number') ||
                count(Employee::where('id_number', $request->get('id_number'))->get() ) > 0 )
            {
                $error_on_id_number = 'ID Number already exists';

                return view('datacapturer.employees.create', compact(['all_cities',
                                                            'all_provinces', 
                                                            'all_regions',
                                                            'employee', 'error_on_id_number']));
            }
            if( $employee->email == $request->get('email') ||
                count(Employee::where('email', $request->get('email'))->get() ) > 0)
            {
                $error_on_email_number = 'Email already exists';

                return view('datacapturer.employees.create', compact(['all_cities',
                                                            'all_provinces', 
                                                            'all_regions',
                                                            'employee', 'error_on_email_number']));
            }
            
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

            /* store employee entry */
            $employee->save();

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
        $employee = Employee::with(['city', 'province','region'])
                             ->findOrFail($id);

        return view('datacapturer.employees.show', 
                        compact(['employee']));
        
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
        $employee = Employee::with(['city', 'province','region'])
                                ->findOrFail($id);

        return view('datacapturer.employees.create', compact(['all_cities',
                                                        'all_provinces', 
                                                        'all_regions',
                                                        'employee']));
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
        $all_cities = City::all();
        $all_provinces = Province::all();
        $all_regions = Region::all();
        $employee = Employee::with(['city', 'province','region'])
                                ->findOrFail($request->get('id'));
        
        $update = array(
            'name' => $request->get('name'),
            'surname' => $request->get('surname'),
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
        );

        if( $employee->employee_number != $request->get('employee_number') )
        {
            $person = Employee::where('employee_number', $request->get('employee_number'))->get();
            $n = count($person);
            if( $n > 0)
            {
                $error_on_employee_number = 'Employee Number already exists';

                return view('datacapturer.employees.create', compact(['all_cities',
                                                            'all_provinces', 
                                                            'all_regions',
                                                            'employee', 
                                                            'error_on_employee_number']));
            }
            else
            {
                $update['employee_number'] = $request->get('employee_number');
            }
            
        }
        if( $employee->id_number != $request->get('id_number')  )
        {
            $person = Employee::where('id_number', $request->get('id_number'))->get();
            $n = count($person);
            if( $n > 0)
            {
                $error_on_id_number = 'ID Number already exists';

                return view('datacapturer.employees.create', compact(['all_cities',
                                                        'all_provinces', 
                                                        'all_regions',
                                                        'employee', 
                                                        'error_on_id_number']));
            }
            else
            {
                $update['id_number'] = $request->get('id_number');
            }
            
        }
        if( $employee->email != $request->get('email') )
        {
            $person = Employee::where('email', $request->get('email'))->get();
            $n = count($person);
            if( $n > 0)
            {
                $error_on_email_number = 'Email already exists';

                return view('datacapturer.employees.create', compact(['all_cities',
                                                            'all_provinces', 
                                                            'all_regions',
                                                            'employee', 
                                                            'error_on_email_number']));
            }
            else
            {
                $update['email'] = $request->get('email');
            }
        }
        
        /* update employee entry */
        $employee->update($update);

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
