<?php

namespace App\Http\Controllers;

use App\UserAssigned;
use App\User;
use Illuminate\Http\Request;
use DB;
class UserAssignedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //dd($request->all());

        $msg = "";         
        $errormsg = "";

        $getuserdata = User::where('role','agent')->where('status','Active')->get();

        //$get_id = DB::table('user_assigneds')->select('id')->get();
        $users = UserAssigned::all();
        //dd($get_id);

         foreach ($request->vehicle_id as $data) {


            $check_vehicle = UserAssigned::where('vehicle_id',$data)->where('user_id',$request->user_id)->first();

          //  dd($check_vehicle);

            if($check_vehicle)
            {
                $errormsg = "this vehicle is already assigned.";
            }
            else
            {
                if($request->user_id == "all")
                {
                   foreach ($getuserdata as $user) {

                            $check_id = UserAssigned::where('vehicle_id',$data)->where('user_id',$user->id)->first();

                            if(!$check_id)
                            {
                                $add = new UserAssigned;
                                $add->vehicle_id = $data;
                                $add->user_id = $user->id;
                                $add->save();
                                $msg = "All User assigned Successfully.";
                            }                    

                   } 
                   
                }
                else
                {
                    $add = new UserAssigned;
                    $add->vehicle_id = $data;
                    $add->user_id = $request->user_id;
                    $add->save();    
                    $msg = "User assigned Successfully.";                    
                }     
            }
                   



        }
        $data = ['message' => $msg,'errormsg' => $errormsg];
       return response()->json($data);
        
       
       

              

     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\user_assigned  $user_assigned
     * @return \Illuminate\Http\Response
     */
    public function show(user_assigned $user_assigned)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user_assigned  $user_assigned
     * @return \Illuminate\Http\Response
     */
    public function edit(user_assigned $user_assigned)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user_assigned  $user_assigned
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user_assigned $user_assigned)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user_assigned  $user_assigned
     * @return \Illuminate\Http\Response
     */
    public function destroy(user_assigned $user_assigned)
    {
        //
    }
}
