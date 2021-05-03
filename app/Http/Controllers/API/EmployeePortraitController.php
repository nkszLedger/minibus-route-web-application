<?php

namespace App\Http\Controllers\API;

use App\EmployeePortrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\API\EmployeePortraitResource;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class EmployeePortraitController extends Controller
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
        $portrait = $request->file('portrait');
        // Get the contents of the file
        $contents = $portrait->openFile()->fread($portrait->getSize());

        $portrait = EmployeePortrait::create([
            'employee_id' => $request->id,
            'portrait' => base64_encode($contents),
    
        ]);

        return new EmployeePortraitResource($portrait);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $portrait = EmployeePortrait::where(
            'employee_id', $id )->first();

        $data = new EmployeePortraitResource( $portrait );
        
        return (['data' => $data]);
    }

    /**
     * Download the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function downloadPortrait($id)
    {
        // Find the military veteran portrait only
        $record = EmployeePortrait::where(
                    'employee_id', $id )->first();

        // get raw image contents
        $blob = $record->portrait;

        // set & clear path
        $destinationPath = public_path().'\downloads\\';
        File::isDirectory($destinationPath) or 
        File::makeDirectory($destinationPath, 0777, true, true);
        //File::cleanDirectory($destinationPath);

        $fileName = $record->employee_id . '_' .$record->id. '_' .time() . '.png';
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
    public function update(Request $request, EmployeePortrait $portrait)
    {
        $portrait->update($request->only(['portrait']));

        return new EmployeePortraitResource($portrait);
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
