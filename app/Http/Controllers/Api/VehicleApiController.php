<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;

class VehicleApiController extends Controller
{
    public function index_datatable(Request $request)
    {
        $vehicles = Vehicle::query();

        return DataTables::of($vehicles)
            ->addColumn('action', function ($vehicle) {
                return
                    $this->btn_view_datatable($vehicle->id) .
                    $this->btn_edit_datatable($vehicle->id) .
                    $this->btn_destroy_datatable($vehicle->id);
            })
            ->setRowClass(function ($vehicle) {
                return random_int(1, 10) % $vehicle->id == 0 ? 'alert-danger' : '';
            })
            ->setRowAttr([
                'color' => 'red',
            ])
            ->addColumn('status', function ($row) {
                if ($row->tenor_over === "YES") {
                    return "<span class='badge badge-primary'>Active</span>";
                }
                return '<span class="badge badge-danger">Deactivate</span>';
            })
            ->filter(function ($instance) use ($request) {
                if ($request->has('finance_office') and $request->get('finance_office') !== null) {
                    $instance->where('finance_company_name', $request->get('finance_office'));
                }
            }, true)

            ->rawColumns(['action', 'status'])
            ->toJson();
    }

    public function btn_view_datatable($id): string
    {
        return
            "<a href='#view-$id'  
                data-toggle='modal' data-target='#vehicle_show_modal'
                class='select_row' 
                >
              <i class='fas fa-eye'></i>
            </a>";
    }

    public function btn_edit_datatable($id): string
    {
        return
            "<a href='#edit-$id' class='text-warning'>
              <i class='fas fa-edit'></i>
            </a>";
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
                <a href='#' class='text-danger' onclick='document.getElementById(\"$form_id\").submit();'>
                  <i class='fas fa-trash'></i>  
                </a>
            </form>";

//            "<a href='#destroy-$id' class='text-danger'>
//              <form id='destroy-form-$id' action='${$id}' method='POST' style='display: none;'>
//                @csrf
//              </form>
//              <i class='fas fa-trash'></i>
//            </a>";
    }

    public function create(Request $request)
    {
        return "vehicle create form";
    }

    public function destroy(Request $request, $id)
    {
//        return $request->all();
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();
        $request->session()->flash('success', 'Record is deleted successfully.');
        return redirect()->back();
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
        ])
 *
 * */