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
    public function show(Member $member)
    {
        return new MemberResource($member);
    }
}
