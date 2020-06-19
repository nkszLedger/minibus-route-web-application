<?php

namespace App\Http\Controllers\API;

use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::where('id_number', $id)->get();

        $data = array('id' => strval($employee[0]['id']),
                        'name' => $employee[0]['name'],
                        'surname' => $employee[0]['surname'],
                        'id_number' => $employee[0]['id_number'],
                        'email' => $employee[0]['email'],
                        'created_at' => (string) $employee[0]['created_at'],
                        'updated_at' => (string) $employee[0]['updated_at']);

        return (['data' => $data]);
    }

}
