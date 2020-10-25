<?php

namespace App\Http\Controllers;

use App\User;
use App\VehicleInformation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\Facades\DataTables;

class SearchVehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $userdata = User::where('role', 'agent')->where('status', 'Active')->get();
        return view('Vehicle-search.table', compact('userdata'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $GetID = $id;

        $Vehicles = VehicleInformation::where('user_id', $id)->get();
        return view('Vehicle-search.Vehicle_search_list', compact('Vehicles', 'GetID'));
    }

    public function map($id)
    {

        $Vehicles = VehicleInformation::where('id', $id)->first();
        return view('Vehicle-search.map', compact('Vehicles'));
    }

    public function datatables_VehicleSearchlist(Request $request)
    {

        $userdata = User::where('role', 'agent')->where('status', 'Active');


        return DataTables::of($userdata)
            ->editColumn('action', function ($userdata) {
                return '<a title="Edit"  href="' . route('vehicle-searchlist.show', $userdata->id) . '"> 
                          <i class="fas fa-eye"></i>
                      </a>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function datatables_VehicleSearchlistShow(Request $request)
    {


        $Vehicles = VehicleInformation::where('user_id', $request->user_id);


        return DataTables::of($Vehicles)
            ->editColumn('map', function ($Vehicles) {
                return '<a title="location"  href="' . route('vehicle.map', $Vehicles->id) . '"> 
                      <i class="fa fa-map-marker"></i>
            </a>    ';
            })
            ->editColumn('user_id', function ($Vehicles) {
                return '' . $Vehicles->agentname->name . '';
            })
            ->editColumn('image', function ($Vehicles) {
                if ($Vehicles->image) {
                    return '<a href="' . asset('uploads/vehicle') . '/' . $Vehicles->image . ' " target="_blank"><img title="uploaded image"  src="' . asset('uploads/vehicle') . '/' . $Vehicles->image . ' " style="height:50px;"></a>';
                }
            })
            ->rawColumns(array("map", "user_id", "image"))
            ->make(true);
    }


}
