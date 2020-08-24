<?php

namespace App\Http\Controllers\Oversight;
use App\Route;
use App\Association;
use App\Employee;
use App\EmployeePosition;
use App\Facility;
use App\MemberDriver;
use App\MemberOperator;
use App\Http\Controllers\Controller;
use App\Region;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_regions = Region::all();
        $all_facilities = Facility::all();
        $driver_count = count(MemberDriver::all());
        $operator_count = count(MemberOperator::all());
        $association_count = count(Association::all());
        $route_count = count(Route::all());
        $all_employees = Employee::all();
        $employee_count = count($all_employees);
        $taxi_ranks_count = count($all_facilities);

        $ekurhuleni_count = count(Employee::where('region_id', 1001)->get());
        $jhb_count = count(Employee::where('region_id', 1002)->get());
        $sedibeng_count = count(Employee::where('region_id', 1003)->get());
        $tshwane_count = count(Employee::where('region_id', 1004)->get());
        $westrand_count = count(Employee::where('region_id', 1005)->get());
        $unknown_count = count(Employee::where('region_id', 1099)->get());

        return view('oversight.dashboard.index', compact(['driver_count',
                                                'operator_count',
                                                'association_count', 
                                                'route_count',
                                                'all_employees',
                                                'employee_count',
                                                'taxi_ranks_count',
                                                'ekurhuleni_count',
                                                'all_facilities',
                                                'jhb_count', 'sedibeng_count',
                                                'tshwane_count', 'westrand_count',
                                                'unknown_count', 'all_regions'
                                            ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
