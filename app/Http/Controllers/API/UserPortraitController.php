<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\UserPortraitResource;
use App\UserPortrait;
use App\User;
use Illuminate\Http\Request;

class UserPortraitController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $portrait = UserPortrait::firstOrCreate([
            'user_id' => $request->id,
            'portrait' => $request->portrait,
            'comments' => $request->comments
        ]);

        return new UserPortraitResource($portrait);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function show(UserPortrait $portrait)
    {
        return new UserPortraitResource($portrait);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserPortrait $portrait)
    {
        $portrait->update($request->only(['portrait', 
                                          'comments']));

        return new UserPortraitResource($portrait);
    }

}
