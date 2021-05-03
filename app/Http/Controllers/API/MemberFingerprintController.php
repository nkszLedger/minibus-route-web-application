<?php

namespace App\Http\Controllers\API;

use App\MemberFingerprint;
use App\Http\Controllers\Controller;
use App\Http\Resources\API\MemberFingerprintResource;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

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
        $fingerprints = MemberFingerprint::firstOrCreate([
            'member_id' => $request->id,
            'fingerprint_left_thumb' =>  
                base64_encode( $request->fingerprint_left_thumb ),
            'fingerprint_right_thumb' => 
                base64_encode( $request->fingerprint_right_thumb )
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
                                                           
        $fingerprint->update($request->only([
            'fingerprint_left_thumb' => base64_encode( $left_thumb_contents), 
            'fingerprint_right_thumb' => base64_encode($right_thumb_contents)]));
                                             
        return new MemberFingerprintResource($fingerprint);
    }

    /**
     * Download the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function downloadLeftFingerprint($id)
    {
        // Find the military veteran fingerprint only
        $record = MemberFingerprint::where(
                    'member_id', $id )->first();
        $this->streamFingerprint($record, "left");

    }

    /**
     * Download the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function downloadRightFingerprint($id)
    {
        // Find the military veteran fingerprint only
        $record = MemberFingerprint::where(
                    'member_id', $id )->first();
        $this->streamFingerprint($record, "right");

    }

    /**
     * Helper-download from the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    private function streamFingerprint(MemberFingerprint $fingerprint, $fingertype)
    {
        // get raw image contents
        $blob = $fingerprint->fingerprint_right_thumb;
        if( $fingertype == "left" )
        { 
            $blob = $fingerprint->fingerprint_left_thumb;
        }
        // set & clear path
        $destinationPath = public_path().'\downloads\\';
        File::isDirectory($destinationPath) or 
        File::makeDirectory($destinationPath, 0777, true, true);
        //File::cleanDirectory($destinationPath);

        $fileName = $fingerprint->member_id . '_' .$fingerprint->id. '_' .time() . '.ansi';
        $path = $destinationPath.$fileName;

        // get processed & decode data
        $my_bytea = stream_get_contents($blob);
        $file_contents_state = file_put_contents( $path, base64_decode( $my_bytea ));

        return Response::stream(function() use($path) {
            echo File::get($path);
        }, 200, ["Content-Type"=> 'ansi']);
    }

}
