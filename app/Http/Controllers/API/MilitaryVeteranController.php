<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\MilitaryVeteran;
use Illuminate\Http\Request;

class MilitaryVeteranController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $military_veteran = MilitaryVeteran::where('id_number', $id)->get();

        $data = array('id' => strval( $military_veteran->first()->id ),
                        'name' => ( $military_veteran->first()->name ),
                        'surname' => $military_veteran->first()->surname,
                        'id_number' => $military_veteran->first()->id_number,
                        'email' => $military_veteran->first()->email,
                        'created_at' => (string) $military_veteran->first()->created_at,
                        'updated_at' => (string) $military_veteran->first()->updated_at
                    );

        return (['data' => $data]);
    }

   
}
