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
    public function register()
    {
        $all_cities = City::all();

        return view('admin/create_employee', compact(['all_cities']));
    }

    /* create, edit or update employee profile */
    public function create_employee(Request $request)
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

    /* show employee profile */
    public function edit_employee($id)
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

    /* remove employee profile */
    public function remove_employee($id)
    {

    }

    /* show all employee profiles */
    public function list_employees()
    {
        $all_cities = City::all();
        $all_employees = Employee::with(['city'])->orderBy('id','desc')->get();

        return view('admin/employees', compact(['all_cities', 'all_employees']));
    }
}
