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


/* Addresses */
Route::get('addresses','AddressController@getAllAddresses');
Route::get('addresses/{id}', 'AddressController@getAddress');
Route::post('addresses', 'AddressController@addAddress');
Route::put('addresses/{address}', 'AddressController@editAddress');
Route::delete('addresses/{address}', 'AddressController@deleteAddress');

/* Persons */
Route::get('persons', 'PersonController@getAllPersons');
Route::get('persons/{id}', 'PersonController@getPerson');
Route::post('persons', 'PersonController@addPerson');
Route::put('persons/{person}', 'PersonController@editPerson');
Route::delete('persons/{person}', 'PersonController@deletePerson');

/* Employees */
Route::get('employees', 'EmployeeController@getAllEmployees');
Route::get('employees/{id}', 'EmployeeController@getEmployee');
Route::post('employees', 'EmployeeController@addEmployee');
Route::put('employees/{employee}', 'EmployeeController@editEmployee');
Route::delete('employees/{employee}', 'EmployeeController@deleteEmployee');

/* Users */
Route::post('users/register', 'RegisterController@addUser');
