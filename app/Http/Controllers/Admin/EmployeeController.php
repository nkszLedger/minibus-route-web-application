<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\City;
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

        if($employee_form_id === null) 
        {
            $employee->name = $request->get('name');
            $employee->surname = $request->get('surname');
            $employee->id_number = $request->get('idnumber');
            $employee->email = $request->get('email');
            $employee->phone_number = $request->get('phonenumber');
            $employee->address_line = $request->get('addressline1');
            $employee->postal_code = $request->get('postal-code');
            $employee->city_id = $request->get('city');

            if( $employee->save() )
            {
                if( $request->get('hasAccess') )
                {
                    $user = new User();
                    $user->employee_id = $employee->id;

                    // if(!empty($request->get('group1'))) {

                    //     foreach ((array)$request->get('group1') as $checkbox_value) {

                    //         $route_vehicle = new RouteVehicle();

                    //         $route_vehicle->route_id = $checkbox_value;
                    //         $route_vehicle->vehicle_id = $vehicle->id;

                    //         $route_vehicle->save();
                    //     }
                    // }
                    $user->save();
                }
            }
        }
    }

    /* show employee profile */
    public function show_employee($id)
    {

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
