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

Route::group(['middleware' => ['auth','owner']],function() {

    Route::get('/dashboard','OwnerController@index');
    Route::get('/newregister','OwnerController@newregister');
    Route::put('/newregister','OwnerController@employeestore');
    Route::get('/employee/{id}','OwnerController@employeedetails');
});
Auth::routes();
Route::get('/', 'EmployeeController@index');
Route::get('/checkout', 'EmployeeController@checkout');
Route::put('/checkin', 'EmployeeController@checkin');
Route::put('/check-out/{id}', 'EmployeeController@check_out');

