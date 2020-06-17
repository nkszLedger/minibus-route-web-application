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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
});

Route::resources([
    'roles' => 'Admin\RoleController',
    'users' => 'Admin\UserController',
    'employees' => 'DataCapturer\EmployeeController',
    'members' => 'DataCapturer\MemberController',
    'dashboard' => 'Oversight\DashboardController'
]);


Route::get('members/getAssociations/{region_id}', 
            'Controller@getAssociationsByRegionID')->name('associations');
Route::get('members/{member_id}/getAssociations/{region_id}', 
            function($member_id, $region_id) {
                return App::make('App\http\Controllers\Controller')
                ->getAssociationsByRegionID($region_id);
});        

Route::get('members/getRoutesPerAssociation/{association_id}', 
            'Controller@getRoutesByAssociationID')->name('regions');
Route::get('members/{member_id}/getRoutesPerAssociation/{association_id}', 
            function($member_id, $association_id) {
                return App::make('App\http\Controllers\Controller')
                ->getRoutesByAssociationID($association_id);
});   

Route::get('getCarRegNumberCount/{carregnumber}', 
            'Controller@getCarRegNumberCount');
Route::get('members/{member_id}/getCarRegNumberCount/{carregnumber}', 
            function($member_id, $carregnumber) {
                return App::make('App\http\Controllers\Controller')
                ->getCarRegNumberCount($carregnumber);
});  

Route::get('membershipNumberExists/{membershipnumber}', 
            'Controller@membershipNumberExists');

Route::get('driversLicenseNumberExists/{licencenumber}', 
            'Controller@driversLicenseNumberExists');

Route::get('idExists/{idnumber}', 
            'Controller@idExists');