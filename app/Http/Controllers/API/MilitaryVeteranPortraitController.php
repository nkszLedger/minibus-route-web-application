<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\MilitaryVeteranPortraitResource;
use App\MilitaryVeteranPortrait;
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

        $portrait = MilitaryVeteranPortrait::create([
            'military_veteran_id' => $request->id,
            'portrait' => $contents,
    
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
