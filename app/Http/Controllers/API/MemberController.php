<?php

namespace App\Http\Controllers\API;

use App\Member;
use App\Http\Controllers\Controller;
use App\Http\Resources\API\MemberResource;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Member::where('id_number', $id)->get();
        
        $data = array('id' => strval($member[0]['id']),
                        'name' => $member[0]['name'],
                        'surname' => $member[0]['surname'],
                        'id_number' => $member[0]['id_number'],
                        'email' => $member[0]['email'],
                        'created_at' => (string) $member[0]['created_at'],
                        'updated_at' => (string) $member[0]['updated_at']);

        return (['data' => $data]);
    }

}
