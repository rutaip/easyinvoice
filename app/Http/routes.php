<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('customers/info/{id}', 'CustomersController@info');
Route::resource('customers', 'CustomersController');
Route::get('cars/info/{id}', 'CarsController@info');
Route::get('cars/details/{id}', 'CarsController@details');
Route::resource('cars', 'CarsController');
Route::resource('services', 'ServicesController');
Route::resource('invoices', 'InvoicesController');
