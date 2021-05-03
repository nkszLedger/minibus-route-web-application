<?php

namespace App\Http\Controllers\API;

use App\MemberPortrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\API\MemberPortraitResource;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class MemberPortraitController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $portrait = MemberPortrait::create([
            'member_id' => $request->id,
            'portrait' => 
                base64_encode( $request->portrait )
        ]);

        return new MemberPortraitResource($portrait);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(MemberPortrait $portrait)
    {
        return new MemberPortraitResource($portrait);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MemberPortrait $portrait)
    {
        $portrait->update($request->only(['portrait']));

        return new MemberPortraitResource($portrait);
    }

    /**
     * Download the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function downloadPortrait($id)
    {
        // Find the military veteran fingerprint only
        $record = MemberPortrait::where(
                    'member_id', $id )->first();

        // get raw image contents
        $blob = $record->fingerprint;

        // set & clear path
        $destinationPath = public_path().'\downloads\\';
        File::isDirectory($destinationPath) or 
        File::makeDirectory($destinationPath, 0777, true, true);
        //File::cleanDirectory($destinationPath);

        $fileName = $record->member_id . '_' .$record->id. '_' .time() . '.png';
        $path = $destinationPath.$fileName;

        // get processed & decode data
        $my_bytea = stream_get_contents($blob);
        $file_contents_state = file_put_contents( $path, base64_decode( $my_bytea ));

        return Response::stream(function() use($path) {
            echo File::get($path);
        }, 200, ["Content-Type"=> 'png']);

    }
}
