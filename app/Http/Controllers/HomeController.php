<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle;
use App\User;
use App\HeadOffices;
use Auth;
use DB;
use App\UserAssigned;
use DataTables;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         $name = Auth::user()->name;

         if($name == "Admin")
         {
            $VehicleCount = Vehicle::all()->count();    
         } 
         else
         {
            $VehicleCount = UserAssigned::where('user_id',Auth::user()->id)->count(); 
         }

        

        $UserActiveCount = User::where('role','agent')->where('status','Active')->count();
        $Users = User::where('role','agent')->get();

        $UserInactiveCount = User::where('role','agent')->where('status','Inactive')->count();
        $HeadOfficeCount = HeadOffices::all()->count();

        return view('dashboard_stat',compact('VehicleCount','UserActiveCount','HeadOfficeCount','UserInactiveCount','Users'));
    }
    public function agentList()
    {

           $Users = User::where('role','agent');

            return DataTables::of($Users)
            ->addColumn('action',function($Users)
            {

                  if ($Users->status == "Active") {
                       return '<span style="background:#0CC27E;color: white;padding: 2px;border-radius: 5px;padding: 5px">Active</span>';
                   }
                   else
                   {
                        return '<span style="background:#FF586B;padding: 2px;color: white;border-radius: 5px;padding: 5px">Inactive</span>';
                   }

               
            })
            ->rawColumns(['action'])
            ->make(true);



    }

}
