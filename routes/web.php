<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(); //['verify' => true]

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth:web'], function() {

    Route::resources([
        'roles' => 'Admin\RoleController',
        'users' => 'Admin\UserController',
        'employees' => 'DataCapturer\EmployeeController',
        'military-veterans' => 'DataCapturer\MilitaryVeteranController',
        'members' => 'DataCapturer\MemberController',
        'dashboard' => 'Oversight\DashboardController'
    ]);

    Route::get('users/deactivate/{user}', 
                'Admin\UserController@deactivate')
                ->name('users.deactivate');

    Route::get('users/activate/{user}', 
                'Admin\UserController@activate')
                ->name('users.activate');

    Route::get('getAllFacilities/', 
                'Controller@getAllFacilities');

    Route::get('vehicles/{member_id}', 
                'DataCapturer\VehicleController@create')
                    ->name('vehicles.create');

    Route::get('vehicles/details/{id}', 
                'DataCapturer\VehicleController@show')
                    ->name('vehicles.show');

    Route::post('vehicles', 
                'DataCapturer\VehicleController@store')
                    ->name('vehicles.store');

    Route::get('vehicles/{id}', 
                'DataCapturer\VehicleController@update')
                    ->name('vehicles.update');

    Route::get('vehicles/remove/{id}', 
                'DataCapturer\VehicleController@destroy')
                    ->name('vehicles.destroy');

    Route::get('employees/getAssociations/{region_id}', 
                'Controller@getAssociationsByRegionID');

    Route::get('employees_verification', 
    'DataCapturer\EmployeeVerificationController@index')
    ->name('employees_verification');

    Route::get('vehicles/getAssociations/{region_id}', 
    'Controller@getAssociationsByRegionID')->name('associations');

    Route::get('employees_verification/{employee_id}/'.
    'association/{association_approved}'.
    '/issued/{letter_issued}'.
    '/signed/{letter_signed}'.
    '/confirmed/{banking_details_confirmed}', 
    function($employee_id, $association_approved, 
            $letter_issued, $letter_signed, 
            $banking_details_confirmed)
    {
        return App::make('App\http\Controllers\Controller')
            ->verifyEmployee($employee_id, $association_approved,
        $letter_issued, $letter_signed, $banking_details_confirmed);
    });

    Route::get('vehicles/{member_id}/getAssociations/{region_id}', 
                function($member_id, $region_id) {
                    return App::make('App\http\Controllers\Controller')
                    ->getAssociationsByRegionID($region_id);
    });        

    Route::get('vehicles/getRoutesPerAssociation/{association_id}', 
                'Controller@getRoutesByAssociationID')->name('regions');
    Route::get('vehicles/{member_id}/getRoutesPerAssociation/{association_id}', 
                function($member_id, $association_id) {
                    return App::make('App\http\Controllers\Controller')
                    ->getRoutesByAssociationID($association_id);
    });   

    Route::get('vehicles/getCarRegNumberCount/{carregnumber}', 
                'Controller@getCarRegNumberCount');
    Route::get('vehicles/{member_id}/getCarRegNumberCount/{carregnumber}', 
                function($member_id, $carregnumber) {
                    return App::make('App\http\Controllers\Controller')
                    ->getCarRegNumberCount($carregnumber);
    });  

    Route::get('members/membershipNumberExists/{membershipnumber}', 
                'Controller@membershipNumberExists');

    Route::get('members/driversLicenseNumberExists/{licencenumber}', 
                'Controller@driversLicenseNumberExists');

    Route::get('members/operatingLicenseNumberExists/{licencenumber}', 
                'Controller@operatingLicenseNumberExists');

    Route::get('members/idExists/{idnumber}', 
                'Controller@idExists');

    Route::get('filterByRegionID/{region_id}/{facility_id}', 
                'Controller@filterByRegionID');

    Route::get('getEmployeeRegionDistribution/', 
                'Controller@getEmployeeRegionDistribution');

    Route::get('getEmployeeRankDistribution/', 
                'Controller@getEmployeeRankDistribution');

    Route::get('getEmployeeGenderDistribution/', 
                'Controller@getEmployeeGenderDistribution');

});