<?php

namespace App\Http\Controllers\API;

use App\EmployeeFingerprint;
use App\Http\Controllers\Controller;
use App\Http\Resources\API\EmployeeFingerprintResource;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class EmployeeFingerprintController extends Controller
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

        $fingerprint = EmployeeFingerprint::create([
            'employee_id' => $request->id,
            'fingerprint' => base64_encode($contents),
        ]);

        return new EmployeeFingerprintResource($fingerprint);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fingerprint = EmployeeFingerprint::where(
            'employee_id', $id )->first();

        $data = new EmployeeFingerprintResource( $fingerprint );
        
        return (['data' => $data]);
    }

    /**
     * Download the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function downloadFingerprint($id)
    {
        // Find the military veteran portrait only
        $record = EmployeeFingerprint::where(
                    'employee_id', $id )->first();

        // get raw image contents
        $blob = $record->fingerprint;

        // set & clear path
        $destinationPath = public_path().'\downloads\\';
        File::isDirectory($destinationPath) or 
        File::makeDirectory($destinationPath, 0777, true, true);
        //File::cleanDirectory($destinationPath);

        $fileName = $record->employee_id . '_' .$record->id. '_' .time() . '.ansi';
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
    public function update(Request $request, EmployeeFingerprint $fingerprint)
    {
        $fingerprint->update($request->only(['fingerprint']));

        return new EmployeeFingerprintResource($fingerprint);
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
