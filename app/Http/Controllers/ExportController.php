<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\VehicleBlankExport;
use App\Exports\VehicleExport;


use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{   
    public function vehicleDownloadblank()
    {
    	return Excel::download(new VehicleBlankExport, 'vehicle.xlsx');
    }
    public function vehicleExport()
    {
    	 return Excel::download(new VehicleExport, 'vehicle.xlsx');
   	}
    


}
