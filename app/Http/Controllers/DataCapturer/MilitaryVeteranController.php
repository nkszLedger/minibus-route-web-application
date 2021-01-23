<?php

namespace App\Http\Controllers\DataCapturer;

use App\City;
use App\Gender;
use App\Http\Controllers\Controller;
use App\Http\Requests\MilitaryVeteranPostRequest;
use App\MilitaryVeteran;
use App\Province;
use App\Region;
use Illuminate\Http\Request;

class MilitaryVeteranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_military_veterans = MilitaryVeteran::with(['city', 'province',
                                        'region', 'position'])
                            ->orderBy('id','desc')->get();

        return view('datacapturer.military.veterans.index', 
                    compact(['all_military_veterans']));
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_cities = City::all();
        $all_gender = Gender::all();
        $all_provinces = Province::all();
        $all_regions = Region::all();

        return view('datacapturer.military.veterans.create', 
                compact(['all_cities', 
                            'all_gender',
                            'all_provinces', 
                            'all_regions'
                        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\MilitaryVeteranPostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MilitaryVeteranPostRequest $request)
    {
        // The incoming request is valid...
        dd("hey");
        
        // Retrieve the validated input data...
        $validated = $request->validated();

        if( $validated )
        {
            dd( $validated );
            //return redirect('military-veterans.create')->withErrors($validated, 'military_veteran');
        }
    }

}
