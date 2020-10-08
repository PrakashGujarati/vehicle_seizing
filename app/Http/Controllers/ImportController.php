<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Imports\VehicleImport;

use Maatwebsite\Excel\Facades\Excel;
use Session;

class ImportController extends Controller
{
    public function vehicleImport(){
    	//Excel::import(new VehicleImport,request()->file('file'));
    	Excel::import(new VehicleImport(request()->finance_company_name),request()->file('file'));


        //Session::flash('message-success', 'Vehicle Data Imported successfully..');
        return redirect()->back();
    }


}
