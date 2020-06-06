<?php

namespace App\Http\Controllers\API;

use App\MemberFingerprint;
use App\Http\Controllers\Controller;
use App\Http\Resources\API\MemberFingerprintResource;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

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
        $left_thumb_file = $request->file('fingerprint_left_thumb');
        $left_thumb_name = 'MNDOTMF' . $request->id . '.' . $left_thumb_file->guessExtension();
        $left_thumb_path = Storage::disk('local')->putFileAs('fingerprint_left_thumb', 
                                                            $left_thumb_file, $left_thumb_name);

        $right_thumb_file = $request->file('fingerprint_right_thumb');
        $right_thumb_name = 'MNDOTMF' . $request->id . '.' . $right_thumb_file->guessExtension();
        $right_thumb_path = Storage::disk('local')->putFileAs('fingerprint_right_thumb', 
                                                            $right_thumb_file, $right_thumb_name);
        
        $fingerprints = MemberFingerprint::firstOrCreate([
            'member_id' => $request->id,
            'fingerprint_left_thumb_path' => $left_thumb_path,
            'fingerprint_right_thumb_path' => $right_thumb_path
        ]);

        return new MemberFingerprintResource($fingerprints);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $fingerprint
     * @return \Illuminate\Http\Response
     */
    public function show(MemberFingerprint $membersfingerprint)
    {
        return new MemberFingerprintResource($membersfingerprint);
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
        $left_thumb_file = $request->file('fingerprint_left_thumb');
        $left_thumb_name = 'MNDOTMF' . $request->id . '.' . $left_thumb_file->guessExtension();
        $left_thumb_path = Storage::disk('local')->putFileAs('fingerprint_left_thumb', 
                                                            $left_thumb_file, $left_thumb_name);

        $right_thumb_file = $request->file('fingerprint_right_thumb');
        $right_thumb_name = 'MNDOTMF' . $request->id . '.' . $right_thumb_file->guessExtension();
        $right_thumb_path = Storage::disk('local')->putFileAs('fingerprint_right_thumb', 
                                                            $right_thumb_file, $right_thumb_name);
                                                           
        $fingerprint->update($request->only(['fingerprint_left_thumb_path' => $left_thumb_path, 
                                             'fingerprint_right_thumb_path' => $right_thumb_path]));
        return new MemberFingerprintResource($fingerprint);
    }

}
