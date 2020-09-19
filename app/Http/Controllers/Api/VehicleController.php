<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;
use App\Vehicle;
use App\User;
use App\UserAssigned;
use DB;

class VehicleController extends Controller
{
    
	public function assignedVehicleList(Request $request)
    {	
		
		
        $vehicleList = DB::table('vehicles')
        ->join('user_assigneds', 'vehicles.id', '=', 'user_assigneds.vehicle_id')
        ->where('user_assigneds.user_id', Auth::user()->id)
        ->get();
        if($vehicleList)
        {
         return response()->json(['vehicleList'=>$vehicleList]);
        }
    }
	public function vehicleCount(Request $request)
	{
		 
          $VehicleCount = UserAssigned::where('user_id',Auth::user()->id)->count(); 
         if($VehicleCount)
	     {
	         return response()->json(['Total Assigned Vehicles :'=>$VehicleCount]);
	     }
	}
	
	public function vehicleList(Request $request)
	{
          $VehicleList = Vehicle::all(); 
         if($VehicleList)
	     {
	         return response()->json(['VehicleList'=>$VehicleList]);
	     }
	}
    
}
