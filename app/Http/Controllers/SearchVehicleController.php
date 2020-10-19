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
//            ->filter(function ($instance) use ($request) {
//                if ($request->has('search') && $request->get('search') !== null) {
//                    $instance->where(function ($q) use ($request) {
//                        $q->orWhere('name', 'like', $request->get('search') . '%');
//                        $q->orWhere('email', 'like', $request->get('search') . '%');
//                    });
//                }
//            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function datatables_VehicleSearchlistShow(Request $request)
    {


        $Vehicles = VehicleInformation::where('user_id', $request->user_id);


        return DataTables::of($Vehicles)
            ->editColumn('map', function ($Vehicles) {
                return '<a title="Map"  href="' . route('vehicle.map', $Vehicles->id) . '"> 
                      <i class="fa fa-map-marker"></i>
            </a>    ';
            })
            ->editColumn('user_id', function ($Vehicles) {
                return '' . $Vehicles->agentname->name . '';
            })
            ->editColumn('image', function ($Vehicles) {
                if ($Vehicles->image) {
                    return '<img src="' . asset('uploads/vehicle') . '/' . $Vehicles->image . ' " style="height:50px;">';
                }
            })
            ->rawColumns(array("map", "user_id", "image"))
            ->make(true);
    }


}
