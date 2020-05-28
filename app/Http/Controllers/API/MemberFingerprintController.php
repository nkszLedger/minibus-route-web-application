<?php

namespace App\Http\Controllers\API;

use App\MemberFingerprint;
use App\Http\Controllers\Controller;
use App\Http\Resources\API\MemberFingerprintResource;
use Illuminate\Http\Request;

class MemberFingerprintController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fingerprints = MemberFingerprint::firstOrCreate([
            'member_id' => $request->id,
            'fingerprint_left_thumb' => $request->fingerprint_left_thumb,
            'fingerprint_right_thumb' => $request->fingerprint_right_thumb
        ]);

        return new MemberFingerprintResource($fingerprints);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(MemberFingerprint $fingerprint)
    {
        return new MemberFingerprintResource($fingerprint);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function update(Request $request, MemberFingerprint $fingerprint)
    {
        $fingerprint->update($request->only(['fingerprint_left_thumb', 
                                             'fingerprint_right_thumb']));
        return new MemberFingerprintResource($fingerprint);
    }

}
