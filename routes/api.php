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
Route::group(['middleware' => 'auth:api'], function () {
    //return $request->user();
    Route::post('profile', 'Api\AgentController@profile');
    Route::post('assigned/vehicle-list', 'Api\VehicleController@assignedVehicleList');
    Route::post('vehicle/count', 'Api\VehicleController@vehicleCount');
    Route::post('vehicle/list', 'Api\VehicleController@vehicleList');
});



   	//Route::post('login', 'Api\AgentController@login');

	Route::post('login', 'Api\AgentController@login');

    Route::post('checkemail', 'Api\AgentController@checkEmail');


	
	



	

