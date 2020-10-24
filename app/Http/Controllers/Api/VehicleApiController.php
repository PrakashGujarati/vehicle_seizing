<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;

class VehicleApiController extends Controller
{
    public function get_vehicle(Request $request, $id = null)
    {
        $vehicle = Vehicle::find($id);
        return ($vehicle) ? $vehicle : false;
    }

    public function index_datatable(Request $request)
    {
        $vehicles = Vehicle::query();

        return DataTables::of($vehicles)
            ->addColumn('action', function ($vehicle) {
                return
                    "<div class='d-flex'>" .
                    $this->btn_view_datatable($vehicle->id) .
                    $this->btn_edit_datatable($vehicle->id) .
                    $this->btn_destroy_datatable($vehicle->id) .
                    "</div>";
            })
            /*->setRowClass(function ($vehicle) {
                return random_int(1, 10) % $vehicle->id == 0 ? 'alert-danger' : '';
            })*/
            ->setRowAttr([
                'data-id' => function($row) {
                    return $row->id;
                },
            ])
            ->addColumn('status', function ($row) {
                if ($row->tenor_over === "YES") {
                    return '<span class="badge badge-primary">Yes</span>';
                }
                return "<span class='badge badge-danger'>No</span>";
            })
            ->filter(function ($instance) use ($request) {
                if ($request->has('finance_office') and $request->get('finance_office') !== null) {
                    $instance->where('finance_company_name', $request->get('finance_office'));
                }
                if ($request->has('search') and $request->get('search') !== null) {
                    $instance->where(function ($q) use ($request) {
                        $q->orWhere('customer_name', 'like', $request->get('search') . '%');
                        $q->orWhere('regd_num', 'like', $request->get('search') . '%');
                    });
                }
            })
            ->rawColumns(['action', 'status'])
            ->toJson();
    }

    public function btn_view_datatable($id): string
    {
        return
            "<a href='#view-$id'  
                data-id='$id'
                data-toggle='modal' data-target='#'
                class='select_row m-1 vehicle_view_btn'
                >
              <i class='fas fa-eye'></i>
            </a> ";
    }

    public function btn_edit_datatable($id): string
    {
        return
            "<a href='".route('Vehicle.edit', $id)."' class='text-warning m-1'>
              <i class='fas fa-edit'></i>
            </a> ";
    }

    public function btn_destroy_datatable($id): string
    {
        $session = Session::token();
        $csrf = "<input type='hidden' name='_token' id='csrf-token' value='$session' />";
        $form_id = "destroy-form-$id";
        $action = route('api.vehicles.destroy', $id);

        return
            "<form id='$form_id' action='$action' method='post'>
                 $csrf
                <a href='#' class='text-danger m-1' onclick='document.getElementById(\"$form_id\").submit();'>
                  <i class='fas fa-trash'></i>  
                </a>
            </form> ";

//            "<a href='#destroy-$id' class='text-danger'>
//              <form id='destroy-form-$id' action='${$id}' method='POST' style='display: none;'>
//                @csrf
//              </form>
//              <i class='fas fa-trash'></i>
//            </a>";
    }

    public function destroy(Request $request, $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();
        $request->session()->flash('success', 'Record is deleted successfully.');
        return redirect()->back();
    }

    public function vehicles_assign(Request $request)
    {
        $request->validate([
            'agent_id' => "required|exists:users,id",
        ]);

        $agent_id = $request->get('agent_id');
        $result_bool = DB::statement("insert into user_assigneds (user_id,vehicle_id) SELECT '$agent_id', id from vehicles");
        if ($result_bool) {
            return redirect()->back()->with(["success" => "Vehicles assigned successfully."]);
        }

        return redirect()->back()->with(["error" => "Something went wrong."]);

//      /*  return $request->all();
//        $vehicle_ids = explode(',', $request->get('vehicles'));
//        $agent_id = $request->get('agent_id');
//        foreach ($vehicle_ids as $vehicle_id) {
//            UserAssigned::create([
//                'user_id' => $agent_id,
//                'vehicle_id' => $vehicle_id,
//            ]);
//        }*/
    }
}



///// Yajra Cheat Sheet
/*
 *
  DataTables::of($query)
        ->addColumn('checkbox', function ($vehicle) {
            return '<input type="checkbox"  name="vehicle_id" value="' . $vehicle->id . '">';
        })
        ->setRowClass(function ($row) {
            return $row->id % 2 == 0 ? 'alert-success' : 'alert-warning';
        })
        ->setRowData([
            'id' => 'test',
        ])
        ->setRowAttr([
            'color' => 'red',
        ])->setRowAttr([
            'color' => function($user) {
                return $user->color;
            },
        ])
 *
 * */