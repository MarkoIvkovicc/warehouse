<?php

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

Route::group(['middleware' => ['auth']], function () {
    Route::resource('/products', 'ProductsController')->middleware('roles:admin,manager');
    Route::resource('/categories', 'CategoriesController')->middleware('roles:admin,manager');
    Route::resource('/suppliers', 'SuppliersController')->middleware('roles:admin,manager');
    Route::resource('/warehouses', 'WarehousesController')->middleware('roles:admin,manager');
    Route::resource('/employees', 'EmployeesController')->middleware('roles:admin,manager');
    Route::resource('/arrivals', 'ArrivalsController')->middleware('roles:admin,employee');
    Route::get('/home', 'HomeController@index')->name('home');
});

Auth::routes();

