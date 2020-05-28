<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'API\UserController@login');

Route::group(['middleware' => 'auth:api'], function() {
    
    Route::post('details', 'API\UserController@details');
    Route::apiResource('members', 'API\MemberController');
    Route::apiResource('membersfingerprint', 'API\MemberFingerprintController');
    Route::apiResource('membersportrait', 'API\MemberPortraitController');

    // Route::post('members/{id}', 'API\MemberController@get_member_details');
    // Route::post('members/fingerprints/{id}', 'API\MemberController@get_member_fingerprints');
    // Route::post('members/portrait/{id}', 'API\MemberController@get_member_portrait');
    // Route::post('members/fingerprints/store', 'API\MemberController@store_member_fingerprints');
    // Route::post('members/portrait/store', 'API\MemberController@store_member_portrait');
    
});