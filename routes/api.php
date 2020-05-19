<?php

use Illuminate\Http\Request;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('/login', 'Api\Auth\AuthController@login');
Route::post('/register', 'Api\Auth\AuthController@register');


Route::group(['middleware' => 'auth.jwt'], function () {
    Route::get('/logout', 'Api\Auth\AuthController@logout');
    Route::get('/refresh', 'Api\Auth\AuthController@refresh');
    Route::get('/me', 'Api\Auth\AuthController@me');

    Route::get('/products/get-all', 'Api\ProductsController@getAll');
    Route::get('/categories/get-all', 'Api\CategoriesController@getAll');
    Route::get('/suppliers/get-all', 'Api\SuppliersController@getAll');
    Route::get('/warehouses/get-all', 'Api\WarehousesController@getAll');
    Route::get('/employees/get-all', 'Api\EmployeesController@getAll');
    Route::get('/arrivals/get-all', 'Api\ArrivalsController@getAll');

    Route::resource('/products', 'Api\ProductsController');
    Route::resource('/categories', 'Api\CategoriesController');
    Route::resource('/suppliers', 'Api\SuppliersController');
    Route::resource('/warehouses', 'Api\WarehousesController');
    Route::resource('/employees', 'Api\EmployeesController');
    Route::resource('/arrivals', 'Api\ArrivalsController');
    Route::get('/home', 'Api\HomeController@index')->name('home');
});
