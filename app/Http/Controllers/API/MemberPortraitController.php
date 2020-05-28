<?php

namespace App\Http\Controllers\API;

use App\MemberPortrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\API\MemberPortraitResource;
use Illuminate\Http\Request;

class MemberPortraitController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $portrait = MemberPortrait::create([
            'member_id' => $request->id,
            'portrait' => $request->portrait
        ]);

        return new MemberPortraitResource($portrait);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(MemberPortrait $portrait)
    {
        return new MemberPortraitResource($portrait);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MemberPortrait $portrait)
    {
        $portrait->update($request->only(['portrait']));

        return new MemberPortraitResource($portrait);
    }
}
