<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', 'Auth\LoginController@loginPage');

/* Route::get('dashboard', function () {
    return view('index-3');
}); */

Route::get('dashboard', function () {
    return view('dashboard');
}); 

Route::get('showregpage', 'MemberController@showregpage');
Route::get('showtestregpage', 'MemberController@showtestregpage');


Route::get('create_member', 'MemberController@create_member');
Route::get('test_create_member', 'MemberController@test_create_member');
Route::get('list_members', 'MemberController@list_members');
Route::get('show_member/{id}', 'MemberController@show_member')->name('show_member');

Route::get('admin/', 'Admin\UserController@list_users');
Route::get('admin/employees', 'Admin\EmployeeController@list_employees');
Route::get('admin/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('admin/login', 'Auth\LoginController@login');
Route::post('admin/logout', 'Auth\LoginController@logout')->name('logout');
// Password Reset Routes...
// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('showmodal/{id}', 'MemberController@showmodal')->name('showmodal');
Route::get('getAssociations/{region_id}', 'MemberController@getAssociations')->name('regions');
Route::get('getRoutesPerAssociation/{association_id}', 'MemberController@getRoutesPerAssociation')->name('regions');


