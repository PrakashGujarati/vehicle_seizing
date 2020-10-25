<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Vehicle;
use App\UserAssigned;
use DB;
use DataTables;
class AssignedVehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicledata = Vehicle::where('id' ,0)->get();
        //$vehicledata = UserAssigned::where('id','0')->first();
        $userdata = User::where('role','agent')->where('status','Active')->get();
        return view('assigned-vehicle.table',compact('userdata','vehicledata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function AssignedVehicle(Request $request)
    {   

        //dd($request->user_id);

          $vehicledata = DB::table('vehicles')
            ->join('user_assigneds', 'vehicles.id', '=', 'user_assigneds.vehicle_id')
            ->where('user_assigneds.user_id', $request->user_id)
            /*->where('vehicles.deleted',null)*/    
            ->paginate('10');

            //dd($vehicledata);



            if(count($vehicledata) > 0)
            {
                 $allowancehtml = view('assigned-vehicle.dynamic_vehicle_table', compact('vehicledata'))->render();
                  $data=['data' => $allowancehtml];
                   return Response()->json($data);        
            }
            else
            {

                 $allowancehtml = view('assigned-vehicle.dynamic_vehicle_table', compact('vehicledata'))->render();
                $msg = "record is not assigned for this agent";

                $data=['msg' => $msg ,'data' => $allowancehtml];

                return Response()->json($data);        

            }
        
        
    }
}
