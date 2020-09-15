<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle;
use App\User;
use App\HeadOffices;
use Auth;
use DB;
use App\UserAssigned;


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
        $UserInactiveCount = User::where('role','agent')->where('status','Inactive')->count();
        $HeadOfficeCount = HeadOffices::all()->count();
        return view('dashboard_stat',compact('VehicleCount','UserActiveCount','HeadOfficeCount','UserInactiveCount'));
    }
}
