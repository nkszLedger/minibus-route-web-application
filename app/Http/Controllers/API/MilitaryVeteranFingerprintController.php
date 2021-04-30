<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\MilitaryVeteranFingerprintResource;
use App\MilitaryVeteranFingerprint;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
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
            'fingerprint' => base64_encode($contents),
    
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
        $fingerprint = MilitaryVeteranFingerprint::where(
            'military_veteran_id', $id )->first();

        $data = new MilitaryVeteranFingerprintResource( $fingerprint);
        
        return (['data' => $data]);

        /*file_put_contents('download.ansi', $download->fingerprint);
        return response()->download( 'download.ansi' );
        // Return the image in the response with the correct MIME type
            return response()->make($user->avatar, 200, array(
        'Content-Type' => (new finfo(FILEINFO_MIME))->buffer($user->avatar)*/

    }

    public function downloadFingerprint($id)
    {
        // Find the military veteran fingerprint only
        $record = MilitaryVeteranFingerprint::where(
                    'military_veteran_id', $id )->first();

        // get raw image contents
        $blob = $record->fingerprint;

        // set & clear path
        $destinationPath = public_path().'\downloads\\';
        File::isDirectory($destinationPath) or 
        File::makeDirectory($destinationPath, 0777, true, true);
        //File::cleanDirectory($destinationPath);

        $fileName = $record->military_veteran_id . '_' .$record->id. '_' .time() . '.ansi';
        $path = $destinationPath.$fileName;

        // get processed & decode data
        $my_bytea = stream_get_contents($blob);
        $file_contents_state = file_put_contents( $path, base64_decode( $my_bytea ));

        return Response::stream(function() use($path) {
            echo File::get($path);
        }, 200, ["Content-Type"=> 'ansi']);

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
