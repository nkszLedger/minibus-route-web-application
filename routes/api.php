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
Route::get('', 'API\UserController@minibushello');

Route::group(['middleware' => 'auth:api'], function() {
    
    Route::post('details', 'API\UserController@details');
    Route::get('members/{id}', 'API\MemberController@show');
    Route::get('employees/{id}', 'API\EmployeeController@show');
    Route::get('military_veterans/{id}', 'API\MilitaryVeteranController@show');
    Route::get('militaryveteranfingerprint/{id}', 'API\MilitaryVeteranFingerprintController@show');

    Route::get('militaryveteranportrait/getfile/{id}', 
                'API\MilitaryVeteranPortraitController@downloadPortrait');
    Route::get('militaryveteranfingerprint/getfile/{id}', 
                'API\MilitaryVeteranFingerprintController@downloadFingerprint');

    Route::get('membersfingerprint/getleftthumbfile/{id}', 
                'API\MemberFingerprintController@downloadLeftFingerprint');
    Route::get('membersfingerprint/getrightthumbfile/{id}', 
                'API\MemberFingerprintController@downloadRightFingerprint');
    Route::get('membersportrait/getfile/{id}', 
                'API\MemberPortraitController@downloadPortrait');

    Route::get('employeesfingerprint/getfile/{id}', 
                'API\EmployeeFingerprintController@downloadFingerprint');
    Route::get('employeesportrait/getfile/{id}', 
                'API\EmployeePortraitController@downloadPortrait');

    Route::apiResource('users', 'API\UserController');
    Route::apiResource('usersfingerprint', 'API\UserFingerprintController');
    Route::apiResource('usersportrait', 'API\UserPortraitController');
    Route::apiResource('membersfingerprint', 'API\MemberFingerprintController');
    Route::apiResource('membersportrait', 'API\MemberPortraitController');
    Route::apiResource('militaryveteranportrait', 'API\MilitaryVeteranPortraitController');
    Route::apiResource('militaryveteranfingerprint', 'API\MilitaryVeteranFingerprintController');
    
});

Route::fallback( function() {
    return response()->json([
        'error' => 'Not found',
    ], 404);
})->name('api.fallback');