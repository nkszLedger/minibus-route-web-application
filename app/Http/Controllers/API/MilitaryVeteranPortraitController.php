<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\MilitaryVeteranPortraitResource;
use App\MilitaryVeteranPortrait;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class MilitaryVeteranPortraitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $portrait = $request->file('portrait');
        // Get the contents of the file
        $contents = $portrait->openFile()->fread($portrait->getSize());

        /*$path = $request->file('portrait')->getRealPath();
        $logo = file_get_contents($path);
        $base64 = base64_encode($logo);*/

        $portrait = MilitaryVeteranPortrait::create([
            'military_veteran_id' => $request->id,
            'portrait' => base64_encode($contents),
    
        ]);

        return new MilitaryVeteranPortraitResource($portrait);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $portrait = MilitaryVeteranPortrait::where(
            'military_veteran_id', $id )->first();

        $data = new MilitaryVeteranPortraitResource( $portrait );
        
        return (['data' => $data]);
    }

    public function downloadPortrait($id)
    {
        // Find the military veteran portrait only
        $record = MilitaryVeteranPortrait::where(
                    'military_veteran_id', $id )->first();

        // get raw image contents
        $blob = $record->portrait;

        // set & clear path
        $destinationPath = public_path().'\downloads\\';
        File::isDirectory($destinationPath) or 
        File::makeDirectory($destinationPath, 0777, true, true);
        //File::cleanDirectory($destinationPath);

        $fileName = $record->military_veteran_id . '_' .$record->id. '_' .time() . '.png';
        $path = $destinationPath.$fileName;

        // get processed & decode data
        $my_bytea = stream_get_contents($blob);
        $file_contents_state = file_put_contents( $path, base64_decode( $my_bytea ));

        return Response::stream(function() use($path) {
            echo File::get($path);
        }, 200, ["Content-Type"=> 'png']);

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
