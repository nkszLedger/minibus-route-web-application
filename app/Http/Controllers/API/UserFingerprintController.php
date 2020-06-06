<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\UserFingerprintResource;
use App\UserFingerprint;
use App\User;
use Illuminate\Http\Request;

class UserFingerprintController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fingerprints = UserFingerprint::firstOrCreate([
            'user_id' => $request->id,
            'fingerprint' => $request->fingerprint,
            'comments' => $request->comments
        ]);

        return new UserFingerprintResource($fingerprints);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $fingerprint)
    {
        return new UserFingerprintResource($fingerprint);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserFingerprint $fingerprint)
    {
        $fingerprint->update($request->only(['fingerprint', 
                                             'comments']));
        return new UserFingerprintResource($fingerprint);
    }

}
