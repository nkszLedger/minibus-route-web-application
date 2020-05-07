<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /* create, edit or update employee profile */
    public function create_employee(Request $request)
    {
        
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
        $all_employees = Employee::all();

        return view('admin/employees', compact(['all_employees']));
    }
}
