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
    Route::get('members/{id}', 'API\MemberController@show');
    Route::apiResource('users', 'API\UserController');
    Route::apiResource('usersfingerprint', 'API\UserFingerprintController');
    Route::apiResource('usersportrait', 'API\UserPortraitController');
    //Route::apiResource('members', 'API\MemberController');
    Route::apiResource('membersfingerprint', 'API\MemberFingerprintController');
    Route::apiResource('membersportrait', 'API\MemberPortraitController');
    
});

Route::fallback( function() {
    return response()->json([
        'error' => 'Not found',
    ], 404);
})->name('api.fallback');