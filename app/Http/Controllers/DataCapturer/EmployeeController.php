<?php

namespace App\Http\Controllers\DataCapturer;
use App\User;
use App\City;
use App\Employee;
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
        $all_cities = City::all();
        $all_roles = Role::all();
        $all_employees = Employee::with(['city'])->orderBy('id','desc')->get();

        return view('datacapturer.employees.index', compact(['all_cities',
                                                      'all_roles', 
                                                      'all_employees']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_cities = City::all();
        $all_roles = Role::all();

        return view('datacapturer.employees.create', compact(['all_cities', 'all_roles']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = new Employee();
        
        /* Finally Capture */
        $employee->name = $request->get('name');
        $employee->surname = $request->get('surname');
        $employee->id_number = $request->get('id_number');
        $employee->employee_id = $request->get('employee_number');
        $employee->phone_number = $request->get('phone_number');
        $employee->address_line = $request->get('address_line');
        $employee->postal_code = $request->get('postal_code');
        $employee->city_id = $request->get('city');

        if( $employee->save() )
        {
            $user = new User();
            $temporal_password = $this->randomPassword();

            $user->email = $request->get('email');
            $user->employee_id = $employee->id;
            $user->password = bcrypt($temporal_password);

            if(!empty($request->get('group'))) {

                foreach ((array)$request->get('group') as $value) 
                {
                    switch($value)
                    {
                        case Role::where('id', 1)->get()[0]['id']:
                            $role = Role::where('id', 1);
                            $user->assignRole([$role->id]);
                        break;

                        case Role::where('id', 2)->get()[0]['id']:
                            $role = Role::where('id', 2);
                            $user->assignRole([$role->id]);
                        break;
                    }
                }
                $user->save();
            }
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::with(['city'])->findOrFail($id);
        $user = User::where('employee_id', $employee->id)->get();

        $all_roles = Role::all();
        $all_cities = City::all();

        return view('datacapturer.employees.create', compact(['all_cities',
                                                        'all_roles',
                                                        'employee',
                                                        'user'
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
        $employee_form_id = $request->get('id');

        if($employee_form_id !== null) 
        {
            $employee = Employee::where('id', $employee_form_id)->get();
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
        //
    }
}
