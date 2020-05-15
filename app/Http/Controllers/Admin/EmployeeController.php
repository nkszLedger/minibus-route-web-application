<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\City;
use App\Role;
use App\Employee;
use App\Http\Controllers\Controller;
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
        $all_cities = City::all();
        $all_employees = Employee::with(['city'])->orderBy('id','desc')->get();

        return view('admin/employees', compact(['all_cities', 'all_employees']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_cities = City::all();

        return view('admin/create_employee', compact(['all_cities']));
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
        $employee_form_id = $request->get('id');

        if($employee_form_id !== null) 
        {
            $employee = Employee::where('id', $employee_form_id)->get();
        }

        dd( $request );
        
        /* Finally Capture */
        // $employee->name = $request->get('name');
        // $employee->surname = $request->get('surname');
        // $employee->id_number = $request->get('id_number');
        // $employee->email = $request->get('email');
        // $employee->phone_number = $request->get('phone_number');
        // $employee->address_line = $request->get('address_line');
        // $employee->postal_code = $request->get('postal_code');
        // $employee->city_id = $request->get('city');

        // if( $employee->save() )
        // {
        //     if( $request->get('hasAccess') )
        //     {
        //         $user = new User();
        //         $user->employee_id = $employee->id;

        //         if(!empty($request->get('group1'))) {

        //             foreach ((array)$request->get('group1') as $rdbutton_value) {

        //                 if( $rdbutton_value == '1' )
        //                 {

        //                 }
        //                 elseif( $rdbutton_value == '2' )
        //                 {

        //                 }
        //                 elseif( $rdbutton_value == '3' )
        //                 {

        //                 }
        //                 elseif( $rdbutton_value == '4' )
        //                 {

        //                 }

        //                 $route_vehicle->save();
        //             }
        //         }
        //         $user->save();
        //     }
        // }
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

        return view('admin/create_employee', compact(['all_cities',
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
        //
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
