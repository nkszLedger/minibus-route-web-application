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
        // Get the file from the request
        // $left_thumb_file = $request->file('fingerprint_left_thumb');
        // $right_thumb_file = $request->file('fingerprint_right_thumb');

        // //Get the contents of the file
        // $left_thumb_contents = $left_thumb_file->openFile()
        //                                        ->fread($left_thumb_file->getSize());
        // $right_thumb_contents = $right_thumb_file->openFile()
        //                                          ->fread($right_thumb_file->getSize());

        $fingerprints = MemberFingerprint::firstOrCreate([
            'member_id' => $request->member_id,
            'fingerprint_left_thumb' => $request->fingerprint_left_thumb,
            'fingerprint_right_thumb' => $request->fingerprint_right_thumb
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
        // Get the file from the request
        $left_thumb_file = $request->file('fingerprint_left_thumb');
        $right_thumb_file = $request->file('fingerprint_right_thumb');

        // Get the contents of the file
        $left_thumb_contents = $left_thumb_file->openFile()
                                               ->fread($left_thumb_file->getSize());
        $right_thumb_contents = $right_thumb_file->openFile()
                                                 ->fread($right_thumb_file->getSize());
                                                           
        $fingerprint->update($request->only(['fingerprint_left_thumb' => $left_thumb_contents, 
                                             'fingerprint_right_thumb' => $right_thumb_contents]));
                                             
        return new MemberFingerprintResource($fingerprint);
    }

}
