<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\MilitaryVeteranFingerprintResource;
use App\MilitaryVeteranFingerprint;
use Illuminate\Http\Request;

class MilitaryVeteranFingerprintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $fingerprint = $request->file('fingerprint');

        // Get the contents of the file
        $contents = $fingerprint->openFile()->fread($fingerprint->getSize());

        $fingerprint = MilitaryVeteranFingerprint::create([
            'military_veteran_id' => $request->id,
            'fingerprint' => $contents,
    
        ]);

        return new MilitaryVeteranFingerprintResource($fingerprint);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fingerprint = MilitaryVeteranFingerprint::where('military_veteran_id',
            $id)->first();

        $data = array( 
            'id' => strval( $fingerprint->id ),
            'fingerprint' => base64_decode($fingerprint->fingerprint),
            'created_at' => (string) $fingerprint->created_at,
            'updated_at' => (string)$fingerprint->updated_at,
        );

        return (['data' => $data]);

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
