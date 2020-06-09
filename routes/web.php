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
    'employees' => 'Admin\EmployeeController',
    'users' => 'Admin\UserController',
    'members' => 'Member\MemberController',
    'dashboard' => 'Dashboard\DashboardController'
]);

Route::get('members/getAssociations/{region_id}', 
            'Controller@getAssociationsByRegionID')->name('associations');
// Route::get('members/{member_id}/getAssociations/{region_id}', 
//             function($member_id, $region_id) {
//                 return App::make('App\http\Controllers\Controller')
//                 ->getAssociationsByRegionID($region_id);
// });        


Route::get('members/getRoutesPerAssociation/{association_id}', 
            'Controller@getRoutesByAssociationID')->name('regions');
// Route::get('members/{member_id}/getRoutesPerAssociation/{association_id}', 
//             function($member_id, $association_id) {
//                 return App::make('App\http\Controllers\Controller')
//                 ->getRoutesByAssociationID($association_id);
// });   

// Route::get('showregpage', 'MemberController@showregpage');
// Route::get('showtestregpage', 'MemberController@showtestregpage');

// Route::get('create_member', 'MemberController@create_member');
// Route::get('test_create_member', 'MemberController@test_create_member');
// Route::get('list_members', 'MemberController@list_members');
// Route::get('show_member/{id}', 'MemberController@show_member')->name('show_member');

// Route::get('admin/', 'Admin\UserController@list_users')->name('users');
// Route::get('admin/employees', 'Admin\EmployeeController@list_employees')->name('employees');
// Route::get('admin/employees/create', 'Admin\EmployeeController@create_employee')->name('create_employee');
// Route::get('admin/employees/registration', 'Admin\EmployeeController@register')->name('register_employee');

// Route::get('showmodal/{id}', 'MemberController@showmodal')->name('showmodal');
// Route::get('getAssociations/{region_id}', 'Controller@getAssociationsByRegionID')->name('regions');
// Route::get('getRoutesPerAssociation/{association_id}', 'Controller@getRoutesByAssociationID')->name('regions');
