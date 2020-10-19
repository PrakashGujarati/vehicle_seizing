<?php

use App\Http\Controllers\Api\VehicleApiController;
use App\Http\Controllers\CsvImportController;
use App\Http\Controllers\VehicleController;
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

    Route::group(['middleware' => 'App\Http\Middleware\ExpiryCheck'], function () {

        Route::get('/', 'HomeController@index')->name('home');
        Route::get('Home/datatables', 'HomeController@agentList')->name('home.agentList');

        Route::get('home', function () {
            return redirect('/');
        });


        Route::resource('Vehicle', 'VehicleController');


        Route::post('vehicle/unassigned', 'VehicleController@vehicleunassigned')->name('vehicle.unassigned');
        Route::post('vehicle/datedelete', 'VehicleController@VehicleSelectedDateDelete')->name('vehicle.datedelete');

        Route::get('vehicle/import', 'VehicleController@import')->name('Vehicle.importpage');


        Route::post('selected-vehicle-display', 'VehicleController@SelectedVehicle')->name('selected-vehicle-display');

        Route::post('manageVehicle', 'VehicleController@manageVehicle')->name('manageVehicle');

        Route::post('manageVehicleimports', 'VehicleController@manageVehicleimports')->name('manageVehicleimports');


        //blank excel
        Route::get('import/download_blank/vehicle', 'ExportController@vehicleDownloadblank')->name('vehicle.download_blank');
        //import excel Data
        Route::post('import/vehicle', 'ImportController@vehicleImport')->name('import.vehicle');
        //Expor excel Data
        Route::get('export/vehicle', 'ExportController@vehicleExport')->name('export.vehicle');

        Route::get('vehicle_search', 'VehicleController@VehicleSearch')->name('Vehicle.search');
        Route::get('vehicleimport_search', 'VehicleController@VehicleImportSearch')->name('Vehicleimport.search');


        Route::resource('office', 'OfficeController');


        Route::get('office-datatables', 'OfficeController@datatables_office')->name('office.datatables');
        Route::get('get/office/delete/{id?}', 'OfficeController@destroy')->name('delete.office');


        /*	Route::get('get/datatables/delete/{id?}', 'OfficeController@destroy')->name('delete.office');*/


        //Route::resource('role', 'RolesController');

        /*
        Route::get('roles/role_id/{role_id}','RolesController@permissionsdisplay')->name('role.get');*/

        Route::get('/roles', 'SpatieRoleController@index_roles')->name('role.get');
        Route::post('/role/{role_id}/assign-permissions', 'SpatieRoleController@assign_permissions')->name('role.assign_permission');


        Route::resource('roles-permission', 'RolePermissionsController');

        Route::resource('user', 'UserController');
        Route::get('/user_search', 'UserController@search_user')->name('user.search');


        Route::post('user/assigneds', 'UserAssignedController@store')->name('userassigneds.store');


        Route::resource('finance-office', 'HeadOfficesController');

        Route::get('financeoffice/datatables', 'HeadOfficesController@datatables_finance_office')->name('finance-office.datatables');

        Route::get('get/financeoffice/delete/{id?}', 'HeadOfficesController@destroy')->name('delete.financeoffice');


        Route::resource('agent-view-permission', 'AgentViewController');


        Route::get('agentview', 'AgentViewController@agent_index')->name('agentview.index');
        Route::get('agent_vehicle_search', 'AgentViewController@AgentVehicleSearch')->name('AgentVehicle.search');

        Route::resource('subscribers', 'SubscriptionController');

        Route::get('subscribers-datatables', 'SubscriptionController@datatables_subscribers')->name('subscribers.datatables');


        Route::resource('assigned-Vehicle', 'AssignedVehicleController');
        Route::post('assigned-vehicle-display', 'AssignedVehicleController@AssignedVehicle')->name('assigned-vehicle-display');

        Route::resource('vehicle-searchlist', 'SearchVehicleController');
        Route::get('VehicleSearchlist-datatables', 'SearchVehicleController@datatables_VehicleSearchlist')->name('VehicleSearchlist.datatables');

        Route::get('VehicleSearchlistShow-datatables', 'SearchVehicleController@datatables_VehicleSearchlistShow')->name('VehicleSearchlistShow.datatables');


        Route::get('vehicle/map/{id}', 'SearchVehicleController@map')->name('vehicle.map');


        Route::get('/dbchange', 'dbController@DBupdate')->name('db');


    });

});


Route::get('api/vehicles', [VehicleApiController::class, 'index_datatable'])->name('api.vehicles.get');
Route::get('vehicles', [VehicleController::class, 'vehicles']);
Route::get('vehicles/create', [VehicleApiController::class, 'create'])->name('vehicles.create');
Route::post('vehicles_assign', [VehicleApiController::class, 'vehicles_assign'])->name('vehicles.assign');
Route::post('vehicles/{id}', [VehicleApiController::class, 'destroy'])->name('api.vehicles.destroy');
Route::post('/csv_import', [CsvImportController::class, "store"])->name('csv.import.store');
