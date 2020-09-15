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

/*Route::get('/', function () {
    return view('dashboard_stat');
});*/

/*
Route::get('home', function () {
    return view('layouts.main');
});*/


/*Route::get('abc', function () {
    return view('customer.index');
});*/



Auth::routes();


Route::group(['middleware' => 'auth'], function () {
	
	Route::get('/', 'HomeController@index')->name('home');



 Route::resource('Vehicle', 'VehicleController');

	  Route::get('vehicle/import', 'VehicleController@import')->name('Vehicle.importpage');



	//blank excel
	Route::get('import/download_blank/vehicle', 'ExportController@vehicleDownloadblank')->name('vehicle.download_blank');
	//import excel Data
	Route::post('import/vehicle', 'ImportController@vehicleImport')->name('import.vehicle');
	//Expor excel Data
	 Route::get('export/vehicle', 'ExportController@vehicleExport')->name('export.vehicle');

	Route::get('vehicle_search','VehicleController@VehicleSearch')->name('Vehicle.search');
	Route::get('vehicleimport_search','VehicleController@VehicleImportSearch')->name('Vehicleimport.search');




	 
	Route::resource('office', 'OfficeController');
	Route::get('/office_search', 'OfficeController@search_Office')->name('office.search');


	//Route::resource('role', 'RolesController');

	/*
	Route::get('roles/role_id/{role_id}','RolesController@permissionsdisplay')->name('role.get');*/

	Route::get('/roles', 'SpatieRoleController@index_roles')->name('role.get');
	Route::post('/role/{role_id}/assign-permissions', 'SpatieRoleController@assign_permissions')->name('role.assign_permission');


	Route::resource('roles-permission', 'RolePermissionsController');

	Route::resource('user', 'UserController');
	Route::get('/user_search', 'UserController@search_user')->name('user.search');



	Route::post('user/assigneds', 'UserAssignedController@store')->name('userassigneds.store');

	Route::resource('headoffice', 'HeadOfficesController');
	Route::get('/headoffice_search', 'HeadOfficesController@search_headoffice')->name('headoffice.search');


	Route::resource('agent-view-permission', 'AgentViewController');
	

	Route::get('agentview', 'AgentViewController@agent_index')->name('agentview.index');
	Route::get('agent_vehicle_search','AgentViewController@AgentVehicleSearch')->name('AgentVehicle.search');

	Route::resource('subscription', 'SubscriptionController');
	Route::get('subscription_search', 'SubscriptionController@search_subscription')->name('subscription.search');




});